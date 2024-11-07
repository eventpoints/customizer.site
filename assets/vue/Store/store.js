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

    setRandomVariables() {
        Object.keys(state.variables).forEach((sectionKey) => {
            Object.keys(state.variables[sectionKey]).forEach((key) => {
                const variable = state.variables[sectionKey][key];
                if (!variable.isLocked) {
                    switch (variable.type) {
                        case 'color':
                            variable.value = this.getRandomColor();
                            break;
                        case 'size':
                            variable.value = this.getRandomSize();
                            break;
                        case 'string':
                            variable.value = this.getRandomString();
                            break;
                        case 'boolean':
                            variable.value = this.getRandomBoolean();
                            break;
                        case 'integer':
                            variable.value = this.getRandomInteger();
                            break;
                        default:
                            console.warn(`Unknown type: ${variable.type}`);
                    }
                }
            });
        });
    },

    getRandomColor() {
        return `#${Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0')}`;
    },

    getRandomSize() {
        const sizes = ['0rem', '0.1rem', '0.15rem', '0.2rem', '0.25rem', '0.3rem', '0.35rem', '0.4rem', '0.4rem', '0.45rem', '0.5rem', '0.55rem', '0.6rem', '0.65rem', '0.7rem', '0.75rem', '0.8rem', '0.85rem', '0.9rem', '0.95rem', '1rem'];
        return sizes[Math.floor(Math.random() * sizes.length)];
    },

    getRandomString() {
        const strings = ['none', 'solid', 'dashed', 'dotted', 'double', 'groove'];
        return strings[Math.floor(Math.random() * strings.length)];
    },

    getRandomBoolean() {
        return Math.random() < 0.5;
    },

    getRandomInteger() {
        return Math.floor(Math.random() * 100);
    }

};


