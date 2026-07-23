import {initAirports} from "./airport";

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAirports);
} else {
    initAirports();
}