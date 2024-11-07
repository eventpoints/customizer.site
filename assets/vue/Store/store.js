import {reactive} from 'vue';

const state = reactive({
    variables: {},
    css: null,
    isLoading: true,
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

    setRandomColorVariables() {
        Object.keys(state.variables.colors).forEach((key) => {
            const color = state.variables.colors[key];
            if (!color.isLocked && color.type === 'color') {
                color.value = `#${Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0')}`;
            }
        });
    }
};
