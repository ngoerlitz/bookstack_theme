var __defProp = Object.defineProperty;
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __publicField = (obj, key, value) => __defNormalProp(obj, typeof key !== "symbol" ? key + "" : key, value);

// resources/js/components/component.js
var Component = class {
  constructor() {
    /**
     * The registered name of the component.
     * @type {string}
     */
    __publicField(this, "$name", "");
    /**
     * The element that the component is registered upon.
     * @type {HTMLElement}
     */
    __publicField(this, "$el", null);
    /**
     * Mapping of referenced elements within the component.
     * @type {Object<string, HTMLElement>}
     */
    __publicField(this, "$refs", {});
    /**
     * Mapping of arrays of referenced elements within the component so multiple
     * references, sharing the same name, can be fetched.
     * @type {Object<string, HTMLElement[]>}
     */
    __publicField(this, "$manyRefs", {});
    /**
     * Options passed into this component.
     * @type {Object<String, String>}
     */
    __publicField(this, "$opts", {});
  }
  /**
   * Component-specific setup methods.
   * Use this to assign local variables and run any initial setup or actions.
   */
  setup() {
  }
  /**
   * Emit an event from this component.
   * Will be bubbled up from the dom element this is registered on, as a custom event
   * with the name `<elementName>-<eventName>`, with the provided data in the event detail.
   * @param {String} eventName
   * @param {Object} data
   */
  $emit(eventName, data = {}) {
    data.from = this;
    const componentName = this.$name;
    const event = new CustomEvent(`${componentName}-${eventName}`, {
      bubbles: true,
      detail: data
    });
    this.$el.dispatchEvent(event);
  }
};

// themes/vatger/modules/components/js/airport.js
var Airport = class extends Component {
  setup() {
    this.container = this.$el;
    this.icao = this.$opts.icao;
    super.setup();
    console.log(`I am alive for ${this.icao}`);
  }
};

// themes/vatger/modules/components/js/index.js
console.log("VATGER bundle loaded");
console.log("Component API:", window.$components);
window.$components.register({
  Airport
});
console.log("Airport registered");
window.$components.init(document.body);
//# sourceMappingURL=vatger.js.map
