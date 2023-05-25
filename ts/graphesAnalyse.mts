import { ChartData, Chart } from "chart.js/auto";
import { LineData, analyseGithubRepo } from "./filesAnalitics.mjs";

const canvas = document.createElement("canvas");
let dataFull: LineData[] | null = null;
let chartLines: Chart | null;
let chartFines: Chart | null;
const lpfileBtn = document.createElement("button");
lpfileBtn.onclick = () => pieLine(dataFull, canvas);
lpfileBtn.innerText = "Afficher le nombre de ligne par fichier";
lpfileBtn.hidden = true;

const fnPfileBtn = document.createElement("button");
fnPfileBtn.onclick = () => pieFile(dataFull, canvas);
fnPfileBtn.innerText = "Afficher le nombre de fonction par fichier";
fnPfileBtn.hidden = true;

const canvasFile = document.createElement('canvas');
const fileSelect = document.createElement("select");
const def = document.createElement("option");
def.value = "";
def.innerText = "-- select file --";
def.disabled = true;
def.selected = true;
fileSelect.appendChild(def);
fileSelect.hidden = true;
fileSelect.onchange = (ev) => {
    const fileName = fileSelect.selectedOptions[0].innerText
    const fileData = dataFull.find(d => d.fileName == fileName);
    pieFunctionDataPerFile(fileData, canvasFile);
}

const maxText = document.createElement("p");
const avgText = document.createElement("p");
const minText = document.createElement("p");


window.onload = () => {
    const form = document.getElementById("get-repo") as HTMLFormElement;

    form.onsubmit = (ev) => {
        const inp = form.elements.namedItem("repo-url") as HTMLInputElement;

        const repoUrl = inp.value;

        analyseGithubRepo(repoUrl)
            .then(rep => dataFull = rep)
            .then(rep => {
                rep.forEach(rep => {
                    if (rep.functionData.count > 0) {
                        const opt = document.createElement("option");
                        opt.innerText = rep.fileName;
                        fileSelect.appendChild(opt);
                    }
                })
            })
            .catch(e => console.error(e));

        lpfileBtn.hidden = false;
        fnPfileBtn.hidden = false;
        fileSelect.hidden = false;

        ev.preventDefault();
    }
    document.body.appendChild(lpfileBtn);
    document.body.appendChild(fnPfileBtn);
    document.body.appendChild(canvas);
    document.body.appendChild(fileSelect);
    document.body.appendChild(canvasFile);
    document.body.appendChild(maxText);
    document.body.appendChild(avgText);
    document.body.appendChild(minText);
}

function pieFile(dataFiles: LineData[], canvas: HTMLCanvasElement) {
    chartLines?.destroy();
    const names = dataFiles.flatMap(d => d.fileName);
    const fn = dataFiles.flatMap(d => d.functionData.count);

    const data: ChartData = {
        labels: names,
        datasets: [{
            label: "function per file",
            data: fn,
        }]
    };

    chartLines = new Chart(canvas, {
        type: "pie",
        data: data
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
            label: "lines per file",
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

    maxText.innerText = `${fileData.functionData.maxLines}`;
    avgText.innerText = `${fileData.functionData.avgLines}`;
    minText.innerText = `${fileData.functionData.minLines}`;

    const data: ChartData = {
        labels: names,
        datasets: [{
            label: "lines per function",
            data: lines
        }]
    };

    chartFines = new Chart(canvas, {
        type: "pie",
        data: data
    });
}
