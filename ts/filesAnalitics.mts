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

export interface LineData {
    fileName: string,
    functionData: {
        count: number,
        maxLines: number,
        avgLines: number,
        minLines: number,
        linesPerFunction: Array<number>
    },
    lines: number
}

const key = {
    name: "github",
    pat: "pat",
    first: "11ANCTHZY0l3xFm6EF3KAa",
    last: "aX91I9qefHWZXWLUzV803E6FYW9XKJ3HNOzKvT4Gnrp3N47JNSUHCk71ohc"
}

export async function analyseGithubRepo(url: string, keyword?: string): Promise<LineData[]> {
    const repo = await getRepoPy(url);
    const dataFull: LineData[] = [];
    if (repo) {
        for (const fileData of repo) {
            dataFull.push(await getLinesData(fileData, keyword));
        }
    }
    return dataFull;

}

async function getLinesData(fileData: RepoFile, keyword?: string): Promise<LineData> {
    const blob = await fetch(fileData.download_url).then(rep => rep.blob());
    const file = new File([blob], fileData.name);
    const formData = new FormData();
    formData.append("file", file);
    formData.append("keywords", keyword);
    formData.append("user", "codeAnalyzer");
    const fun = keyword? "keywords" : "lines";
    const data: LineData = await fetch(`http://localhost:8001/${fun}`, { method: "POST", body: formData }).then(rep => rep.json());
    data.fileName = fileData.name;
    return data;
}

function repoUrlToAPIUrl(repoUrl: string): {
    uname: string,
    repo: string
} | null {
    const match = RegExp(/https:\/\/github\.com\/([a-zA-Z0-9-]*)\/([a-zA-Z0-9-]*)$/).exec(repoUrl);
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
        headers.append("Authorization", `Bearer ${key.name}_${key.pat}_${key.first}_${key.last}`);
        const rep = await fetch(url, {
            method: "GET",
            headers: headers
        });
        const head = rep.headers;
        console.log(...head);
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
    headers.append("Authorization", `Bearer ${key.name}_${key.pat}_${key.first}_${key.last}`);
    const rep = await fetch(url, {
        method: "GET",
        headers: headers
    });
    const head = rep.headers;
    console.log(...head);
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
