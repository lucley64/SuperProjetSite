interface RepoFile {
    name: string,
    path: string,
    sha: string,
    size: number,
    url: string,
    html_url: string,
    git_url: string,
    download_url: string,
    type: string,
    _links: {
        self: string,
        git: string,
        html: string,
    }
}

interface Failed {
    documentation_url: string,
    message: string
}

let remaining = "0";
const remainingText = document.createElement("p");


window.onload = () => {
    const form = document.getElementById("get-repo") as HTMLFormElement;

    form.onsubmit = (ev) => {
        const inp = form.elements.namedItem("repo-url") as HTMLInputElement;
        const repoUrl = inp.value;

        getRepoPy(repoUrl).then(repo => console.log(repo));

        ev.preventDefault();
    }

    document.body.appendChild(remainingText);
}

function repoUrlToAPIUrl(repoUrl: string): {
    uname: string,
    repo: string
} | null {
    const match = repoUrl.match(/https:\/\/github\.com\/([a-zA-Z0-9-]*)\/([a-zA-Z0-9-]*)$/);
    if (match) {
        return {
            uname: match[1],
            repo: match[2],
        };
    }
    return null;
}

async function getRepoPy(url: string): Promise<RepoFile[]> {
    const cred = repoUrlToAPIUrl(url);
    if (cred) {
        const url = `https://api.github.com/repos/${cred.uname}/${cred.repo}/contents`;
        const headers = new Headers();
        headers.append("Authorization", "Bearer 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");
        const rep = await fetch(url, {
            method: "GET",
            headers: headers
        });
        const head = rep.headers;
        remaining = head.get("x-ratelimit-remaining");
        console.log(...head);
        updateRemainings();
        const json = await rep.json() as RepoFile[] | Failed;
        if ('message' in json) {
            alert("Le repository n'est pas accessible")
        }
        else {
            const files = await getPythonFiles(json);
            return files;
        }
    }

}

async function makeRequest(url: string): Promise<RepoFile[]> {
    const headers = new Headers();
    headers.append("Authorization", "Bearer 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");
    const rep = await fetch(url, {
        method: "GET",
        headers: headers
    });
    const head = rep.headers;
    remaining = head.get("x-ratelimit-remaining");
    console.log(...head);
    updateRemainings();
    return await rep.json();
}

async function getPythonFiles(json: RepoFile[]): Promise<RepoFile[]> {
    let ret: RepoFile[] = [];

    for (const val of json) {
        console.log(`Fichier actuel ${val.name}`);

        if (val.type === "file" && val.name.match(/(.py)$/)) {
            ret.push(val);
        }
        else if (val.type === "dir") {
            const files = await makeRequest(val.url.split(/\?/)[0]);
            const urls = await getPythonFiles(files);
            ret = ret.concat(urls);
        }
    }


    return ret;
}

function updateRemainings() {
    remainingText.textContent = `Il reste ${remaining} requettes`;
}
