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

    // Method to update locked state for specific color keys
    updateLock(id, locked) {
        state.lockedColors[id] = locked;
    },

    setRandomColorVariables() {
        Object.keys(state.variables.colors).forEach((key) => {
            if (!state.lockedColors[key]) {
                state.variables.colors[key] = `#${Math.floor(Math.random() * 16777215)
                    .toString(16)
                    .padStart(6, '0')}`;
            }
        });
    },
};
