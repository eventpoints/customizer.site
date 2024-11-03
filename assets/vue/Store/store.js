import {reactive, computed} from 'vue';

const state = reactive({
    variables: {},
    css: null,
    isLoading: true,
    sourcesOptions: [
        '/examples/example.bootstrap.5.3.html',
        '/examples/custom.html',
    ]
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
};
