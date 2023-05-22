import { defineConfig } from 'rollup';
import typescript from '@rollup/plugin-typescript';
import nodeResolve from '@rollup/plugin-node-resolve'


export default defineConfig({
    input: "ts/graphesAnalyse.mts",
    output: {
        format: "es",
        dir: "js",
    },
    plugins: [
        typescript(),
        nodeResolve(),
    ]
});
