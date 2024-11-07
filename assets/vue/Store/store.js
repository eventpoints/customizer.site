import { reactive } from 'vue';

const state = reactive({
    variables: {},
    css: null,
    isLoading: true,
    lockedColors: {},
});

export const store = {
    state,

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
                colorItem.value = `#${Math.floor(Math.random() * 16777215)
                    .toString(16)
                    .padStart(6, '0')}`;
            }
        });
    },

    resetDefaults(sectionKey) {
        if (state.variables[sectionKey]) {
            Object.keys(state.variables[sectionKey]).forEach((key) => {
                const item = state.variables[sectionKey][key];
                item.value = item.default;
            });
        }
    },
};
