import { ChartData, Chart } from "chart.js/auto";
import { LineData, analyseGithubRepo } from "./filesAnalitics.mjs";

const divC = document.createElement("div");
divC.className = "container";
const canvas = document.createElement("canvas");
divC.appendChild(canvas);
let dataFull: LineData[] | null = null;
let chartLines: Chart | null;
let chartFines: Chart | null;
const lpfileBtn = document.createElement("button");
lpfileBtn.onclick = () => pieLine(dataFull, canvas);
lpfileBtn.innerText = "Afficher le nombre de ligne par fichier";
lpfileBtn.hidden = true;
lpfileBtn.className = "nom";

const fnPfileBtn = document.createElement("button");
fnPfileBtn.onclick = () => pieFile(dataFull, canvas);
fnPfileBtn.innerText = "Afficher le nombre de fonction par fichier";
fnPfileBtn.hidden = true;
fnPfileBtn.className = "nom";

const divF = document.createElement("div");
divF.className = "container";
const canvasFile = document.createElement('canvas');
divF.appendChild(canvasFile);
const fileSelect = document.createElement("select");
const def = document.createElement("option");
def.value = "";
def.innerText = "-- Selectioner un fichier --";
def.disabled = true;
def.selected = true;
fileSelect.appendChild(def);
fileSelect.hidden = true;
fileSelect.className = "nom";
fileSelect.onchange = (ev) => {
    const fileName = fileSelect.selectedOptions[0].innerText
    const fileData = dataFull.find(d => d.fileName == fileName);
    pieFunctionDataPerFile(fileData, canvasFile);
}

const maxText = document.createElement("p");
const avgText = document.createElement("p");
const minText = document.createElement("p");

const text = document.createElement("p");
text.innerText = "Chargement";

function verifKw(baseDiv: HTMLDivElement, url: string, keyword: string){
    const kw = document.getElementById("keywords") as HTMLInputElement|null;
    const kws = kw? kw.value : null;
    balanceFunction(baseDiv, url, kws);
}


function balanceFunction(baseDiv: HTMLDivElement, url: string, keyword?: string) {
    baseDiv.appendChild(text);
    analyseGithubRepo(url, keyword)
        .then(rep => dataFull = rep)
        .then(rep => {
            if (!keyword) {
                rep.forEach(rep => {
                    if (rep.functionData.count > 0) {
                        const opt = document.createElement("option");
                        opt.innerText = rep.fileName;
                        fileSelect.appendChild(opt);
                    }
                });
                if (dataFull.length <= 0) {
                    text.hidden = true;
                    alert("Le repository est inaccessible");
                }
                else {
                    text.hidden = true;
                    lpfileBtn.hidden = false;
                    fnPfileBtn.hidden = false;
                    fileSelect.hidden = false;
                    baseDiv.appendChild(lpfileBtn);
                    baseDiv.appendChild(fnPfileBtn);
                    baseDiv.appendChild(divC);
                    baseDiv.appendChild(fileSelect);
                    baseDiv.appendChild(divF);
                    divF.appendChild(maxText);
                    divF.appendChild(avgText);
                    divF.appendChild(minText);
                }
            }
            else {
                console.log(rep);
                
            }
        })
        .catch(e => console.error(e));
}

window.onload = () => {
    const thig = document.createElement("button");
    thig.onclick = () => verifKw(null, null, null);
}

function pieFile(dataFiles: LineData[], canvas: HTMLCanvasElement) {
    chartLines?.destroy();
    const names = dataFiles.flatMap(d => d.fileName);
    const fn = dataFiles.flatMap(d => d.functionData.count);

    const data: ChartData = {
        labels: names,
        datasets: [{
            label: "fonction par fichier",
            data: fn,
        }]
    };

    chartLines = new Chart(canvas, {
        type: "pie",
        data: data,
    });
}

function pieLine(dataFiles: LineData[], canvas: HTMLCanvasElement) {
    chartLines?.destroy();
    const names = dataFiles.flatMap(d => d.fileName);
    const lines = dataFiles.flatMap(d => d.lines);

    const data: ChartData = {
        labels: names,
        datasets: [
            {
                label: "lignes par fichier",
                data: lines,
            }]
    };

    chartLines = new Chart(canvas, {
        type: "pie",
        data: data
    });
}

function pieFunctionDataPerFile(fileData: LineData, canvas: HTMLCanvasElement) {
    chartFines?.destroy();
    const names = [...fileData.functionData.linesPerFunction.keys()];
    const lines = fileData.functionData.linesPerFunction

    maxText.innerText = `Nombre maximum de ligne par fonction ${fileData.functionData.maxLines}`;
    avgText.innerText = `Nombre moyen de ligne par fonction ${fileData.functionData.avgLines}`;
    minText.innerText = `Nombre ninimum de ligne par fonction ${fileData.functionData.minLines}`;

    const data: ChartData = {
        labels: names,
        datasets: [{
            label: "lignes par fonction",
            data: lines
        }]
    };

    chartFines = new Chart(canvas, {
        type: "pie",
        data: data
    });
}
