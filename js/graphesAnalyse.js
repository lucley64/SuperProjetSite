/******************************************************************************
Copyright (c) Microsoft Corporation.

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
PERFORMANCE OF THIS SOFTWARE.
***************************************************************************** */
/* global Reflect, Promise */


function __awaiter(thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
}

let remaining = "0";
const remainingText = document.createElement("p");
window.onload = () => {
    const form = document.getElementById("get-repo");
    form.onsubmit = (ev) => {
        const inp = form.elements.namedItem("repo-url");
        const repoUrl = inp.value;
        getRepoPy(repoUrl).then(repo => console.log(repo));
        ev.preventDefault();
    };
    document.body.appendChild(remainingText);
};
function repoUrlToAPIUrl(repoUrl) {
    const match = repoUrl.match(/https:\/\/github\.com\/([a-zA-Z0-9-]*)\/([a-zA-Z0-9-]*)$/);
    if (match) {
        return {
            uname: match[1],
            repo: match[2],
        };
    }
    return null;
}
function getRepoPy(url) {
    return __awaiter(this, void 0, void 0, function* () {
        const cred = repoUrlToAPIUrl(url);
        if (cred) {
            const url = `https://api.github.com/repos/${cred.uname}/${cred.repo}/contents`;
            const headers = new Headers();
            headers.append("Authorization", "Bearer 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");
            const rep = yield fetch(url, {
                method: "GET",
                headers: headers
            });
            const head = rep.headers;
            remaining = head.get("x-ratelimit-remaining");
            console.log(...head);
            updateRemainings();
            const json = yield rep.json();
            if ('message' in json) {
                alert("Le repository n'est pas accessible");
            }
            else {
                const files = yield getPythonFiles(json);
                return files;
            }
        }
    });
}
function makeRequest(url) {
    return __awaiter(this, void 0, void 0, function* () {
        const headers = new Headers();
        headers.append("Authorization", "Bearer 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");
        const rep = yield fetch(url, {
            method: "GET",
            headers: headers
        });
        const head = rep.headers;
        remaining = head.get("x-ratelimit-remaining");
        console.log(...head);
        updateRemainings();
        return yield rep.json();
    });
}
function getPythonFiles(json) {
    return __awaiter(this, void 0, void 0, function* () {
        let ret = [];
        for (const val of json) {
            console.log(`Fichier actuel ${val.name}`);
            if (val.type === "file" && val.name.match(/(.py)$/)) {
                ret.push(val);
            }
            else if (val.type === "dir") {
                const files = yield makeRequest(val.url.split(/\?/)[0]);
                const urls = yield getPythonFiles(files);
                ret = ret.concat(urls);
            }
        }
        return ret;
    });
}
function updateRemainings() {
    remainingText.textContent = `Il reste ${remaining} requettes`;
}
