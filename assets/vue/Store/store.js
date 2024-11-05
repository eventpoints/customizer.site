import { reactive } from 'vue';

const state = reactive({
    variables: {
        colors: {},
        general: {}
    },
    css: null,
    isLoading: true,
    sourcesOptions: [
        '/examples/example.bootstrap.5.3.html',
        '/examples/custom.html',
    ],
    lockedColors: {}, // Track which colors are locked
});

export const store = {
    state,

    get sourcesOptions() {
        return state.sourcesOptions;
    },
    set sourcesOptions(value) {
        state.sourcesOptions = value;
    },

    // Getter and Setter for `variables`
    get variables() {
        return state.variables;
    },
    set variables(value) {
        state.variables = value;
    },

    // Getter and Setter for `css`
    get css() {
        return state.css;
    },
    set css(value) {
        state.css = value;
    },

    // Getter and Setter for `isLoading`
    get isLoading() {
        return state.isLoading;
    },
    set isLoading(value) {
        state.isLoading = value;
    },

    // Method to update locked state for specific keys
    updateLock(id, locked) {
        state.lockedColors[id] = locked;
    },

    // Function to set random color values, excluding locked colors
    setRandomColorVariables() {
        Object.keys(state.variables.colors).forEach((key) => {
            const colorItem = state.variables.colors[key];
            if (!state.lockedColors[key] && colorItem.type === 'color') {
                colorItem.default = `#${Math.floor(Math.random() * 16777215)
                    .toString(16)
                    .padStart(6, '0')}`;
            }
        });
    },

    resetDefaults(sectionKey) {
        if (state.variables[sectionKey]) {
            Object.keys(state.variables[sectionKey]).forEach((key) => {
                const item = state.variables[sectionKey][key];
                item.default = item.default;
            });
        }
    },
};
