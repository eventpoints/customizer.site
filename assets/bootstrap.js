import {startStimulusApp} from '@symfony/stimulus-bridge';
import ColorPicker from '@stimulus-components/color-picker'

export const app = startStimulusApp(require.context(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    true,
    /\.(j|t)sx?$/
));

app.register('color-picker', ColorPicker)
