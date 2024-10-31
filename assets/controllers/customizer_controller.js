import { Controller } from "@hotwired/stimulus";
export default class extends Controller {
    static targets = ["form"];

    // Define Bootstrap-compatible variables
    variables = {
        primary: "#00796b",
        secondary: "#dee2e6",
        success: "#2e7d32",
        info: "#3949ab",
        warning: "#ffa000",
        danger: "#c62828",
        light: "#dee2e6",
        dark: "#333333",
    };

    updateColor(event) {
        const name = event.target.name;
        const value = event.target.value;
        this.variables[name] = value;
        this.applyStyles(); // Apply styles on each change for instant feedback
    }

    applyStyles() {
        // Build SCSS content with updated Bootstrap variables
        let scssContent = "";
        for (const [key, value] of Object.entries(this.variables)) {
            console.log(key)
            scssContent += `${key} : ${value};\n`;
        }

        // Import Bootstrap styles
        scssContent += `@import "~bootstrap/scss/bootstrap";`;

        try {

        } catch (error) {
            console.error("SCSS compilation error:", error);
        }
    }

    injectStyles(css) {
        let styleTag = document.getElementById("dynamic-bootstrap-styles");
        if (!styleTag) {
            styleTag = document.createElement("style");
            styleTag.id = "dynamic-bootstrap-styles";
            document.head.appendChild(styleTag);
        }

        styleTag.innerHTML = css;
    }
}
