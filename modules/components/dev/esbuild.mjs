import * as esbuild from "esbuild";
import path from "node:path";
import {fileURLToPath} from "node:url";

const currentFile = fileURLToPath(import.meta.url);
const currentDirectory = path.dirname(currentFile);
const moduleDirectory = path.resolve(currentDirectory, "..");

const watch = process.argv.includes("watch");

const options = {
    entryPoints: [
        path.join(moduleDirectory, "js/index.js"),
    ],
    outfile: path.join(moduleDirectory, "public/dist/vatger.js"),

    bundle: true,
    format: "esm",
    platform: "browser",
    target: "es2021",
    sourcemap: false,
};

if (watch) {
    const context = await esbuild.context(options);
    await context.watch();

    console.log("Watching VATGER JavaScript files...");
} else {
    await esbuild.build(options);
}