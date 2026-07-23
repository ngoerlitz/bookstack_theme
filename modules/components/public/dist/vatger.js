// themes/vatger/modules/components/js/airport.js
function initAirports() {
  const page = document.querySelector(".page-content");
  if (!page) {
    return;
  }
  replaceAirportCodes(page);
}
function replaceAirportCodes(root) {
  const walker = document.createTreeWalker(
    root,
    NodeFilter.SHOW_TEXT
  );
  const nodes = [];
  while (walker.nextNode()) {
    if (walker.currentNode.nodeValue.includes("[airport:")) {
      nodes.push(walker.currentNode);
    }
  }
  for (const node of nodes) {
    replaceNode(node);
  }
}
function replaceNode(textNode) {
  const pattern = /\[airport:([A-Z0-9]{4})]/gi;
  const text = textNode.nodeValue;
  let match;
  let offset = 0;
  const fragment = document.createDocumentFragment();
  while ((match = pattern.exec(text)) !== null) {
    fragment.append(text.slice(offset, match.index));
    const element = document.createElement("span");
    element.className = "vatger-airport";
    element.textContent = "Loading METAR\u2026";
    fragment.append(element);
    loadMetar(element, match[1].toUpperCase());
    offset = pattern.lastIndex;
  }
  if (offset === 0) {
    return;
  }
  fragment.append(text.slice(offset));
  textNode.replaceWith(fragment);
}
async function loadMetar(element, icao) {
  try {
    const response = await fetch(
      `/vatger/metar/${encodeURIComponent(icao)}`
    );
    if (!response.ok) {
      throw new Error(`METAR request failed: ${response.status}`);
    }
    const data = await response.json();
    console.log(data);
    element.textContent = data.metar;
  } catch (error) {
    console.error(error);
    element.textContent = "METAR unavailable";
  }
}

// themes/vatger/modules/components/js/index.js
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initAirports);
} else {
  initAirports();
}
