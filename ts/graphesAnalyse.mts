import { ChartData, Chart } from "chart.js/auto";
import { LineData, analyseGithubRepo } from "./filesAnalitics.mjs";

const canvas = document.createElement("canvas");
let dataFull: LineData[] | null = null;
let chartLines: Chart | null;
let chartFines: Chart | null;
const lpfileBtn = document.createElement("button");
lpfileBtn.onclick = () => {
    chartLines?.setDatasetVisibility(0, true);
    chartLines?.setDatasetVisibility(1, false);
    chartLines?.update('none');
}
lpfileBtn.innerText = "Afficher le nombre de ligne par fichier";
lpfileBtn.hidden = true;

const fnPfileBtn = document.createElement("button");
fnPfileBtn.onclick = () => {
    chartLines?.setDatasetVisibility(0, false);
    chartLines?.setDatasetVisibility(1, true);
    chartLines?.update('none');
};
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



window.onload = () => {
    const form = document.getElementById("get-repo") as HTMLFormElement;

    form.onsubmit = (ev) => {
        const inp = form.elements.namedItem("repo-url") as HTMLInputElement;

        const repoUrl = inp.value;

        analyseGithubRepo(repoUrl)
            .then(rep => dataFull = rep)
            .then(rep => {
                generatePieFile(rep, canvas);

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
}

function generatePieFile(dataFiles: LineData[], canvas: HTMLCanvasElement) {
    const names = dataFiles.flatMap(d => d.fileName);
    const fn = dataFiles.flatMap(d => d.functionData.count);
    const lines = dataFiles.flatMap(d => d.lines);

    const data: ChartData = {
        labels: names,
        datasets: [{
            label: "function per file",
            data: fn,
            hidden: true
        },
        {
            label: "lines per file",
            data: lines,
            hidden: true
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
