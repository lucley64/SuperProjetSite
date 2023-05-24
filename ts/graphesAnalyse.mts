import { ChartData, Chart } from "chart.js/auto";
import { LineData, analyseGithubRepo } from "./filesAnalitics.mjs";

const canvas = document.createElement("canvas");
let dataFull: LineData[] | null = null;
let chart: Chart | null;
const lpfileBtn = document.createElement("button");
lpfileBtn.onclick = ev => {
    if (dataFull) {
        pieLinesPerFile(dataFull, canvas);
    }
}
lpfileBtn.innerText = "Afficher le nombre de ligne par fichier";
lpfileBtn.hidden = true;

window.onload = () => {
    const form = document.getElementById("get-repo") as HTMLFormElement;

    form.onsubmit = (ev) => {
        const inp = form.elements.namedItem("repo-url") as HTMLInputElement;

        const repoUrl = inp.value;

        analyseGithubRepo(repoUrl).then(rep => dataFull = rep);

        lpfileBtn.hidden = false;

        ev.preventDefault();
    }
    document.body.appendChild(lpfileBtn);
    document.body.appendChild(canvas);
}

function pieLinesPerFile(dataFiles: LineData[], canvas: HTMLCanvasElement) {
    chart?.clear();
    const names = dataFiles.flatMap(d => d.fileName);
    const lines = dataFiles.flatMap(d => d.lines);

    const data: ChartData = {
        labels: names,
        datasets: [{
            label: "lines per file",
            data: lines
        }]
    };

    chart = new Chart(canvas, {
        type: "pie",
        data: data
    });
}
