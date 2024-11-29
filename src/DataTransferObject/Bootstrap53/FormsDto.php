<?php declare(strict_types=1);

namespace App\DataTransferObject\Bootstrap53;

use App\DataTransferObject\InputDto;
use App\Enumerators\InputTypeEnum;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    title: "Bootstrap 5.3 - Forms",
    type: "object",
)]
#[Groups(['form', 'compile'])]
final readonly class FormsDto
{
    public function __construct(
        private InputDto $formTextMarginTop = new InputDto(label: 'Form Text Margin Top', type: InputTypeEnum::SIZE, default: '.25rem', isLocked: true),
        private InputDto $formTextFontSize = new InputDto(label: 'Form Text Font Size', type: InputTypeEnum::SIZE, default: '$small-font-size', isLocked: true),
        private InputDto $formTextFontStyle = new InputDto(label: 'Form Text Font Style', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $formTextFontWeight = new InputDto(label: 'Form Text Font Weight', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $formTextColor = new InputDto(label: 'Form Text Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)'),

        private InputDto $formLabelMarginBottom = new InputDto(label: 'Form Label Margin Bottom', type: InputTypeEnum::SIZE, default: '.5rem', isLocked: true),
        private InputDto $formLabelFontSize = new InputDto(label: 'Form Label Font Size', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $formLabelFontStyle = new InputDto(label: 'Form Label Font Style', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $formLabelFontWeight = new InputDto(label: 'Form Label Font Weight', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $formLabelColor = new InputDto(label: 'Form Label Color', type: InputTypeEnum::STRING, default: 'null', isLocked: true),

        private InputDto $inputPaddingY = new InputDto(label: 'Input Padding Y', type: InputTypeEnum::SIZE, default: '$input-btn-padding-y', isLocked: true),
        private InputDto $inputPaddingX = new InputDto(label: 'Input Padding X', type: InputTypeEnum::SIZE, default: '$input-btn-padding-x', isLocked: true),
        private InputDto $inputFontFamily = new InputDto(label: 'Input Font Family', type: InputTypeEnum::STRING, default: '$input-btn-font-family', isLocked: true),
        private InputDto $inputFontSize = new InputDto(label: 'Input Font Size', type: InputTypeEnum::SIZE, default: '$input-btn-font-size', isLocked: true),
        private InputDto $inputFontWeight = new InputDto(label: 'Input Font Weight', type: InputTypeEnum::STRING, default: '$font-weight-base', isLocked: true),
        private InputDto $inputLineHeight = new InputDto(label: 'Input Line Height', type: InputTypeEnum::SIZE, default: '$input-btn-line-height', isLocked: true),

        private InputDto $inputPaddingYSm = new InputDto(label: 'Input Padding Y Sm', type: InputTypeEnum::SIZE, default: '$input-btn-padding-y-sm', isLocked: true),
        private InputDto $inputPaddingXSm = new InputDto(label: 'Input Padding X Sm', type: InputTypeEnum::SIZE, default: '$input-btn-padding-x-sm', isLocked: true),
        private InputDto $inputFontSizeSm = new InputDto(label: 'Input Font Size Sm', type: InputTypeEnum::SIZE, default: '$input-btn-font-size-sm', isLocked: true),

        private InputDto $inputPaddingYLg = new InputDto(label: 'Input Padding Y Lg', type: InputTypeEnum::SIZE, default: '$input-btn-padding-y-lg', isLocked: true),
        private InputDto $inputPaddingXLg = new InputDto(label: 'Input Padding X Lg', type: InputTypeEnum::SIZE, default: '$input-btn-padding-x-lg', isLocked: true),
        private InputDto $inputFontSizeLg = new InputDto(label: 'Input Font Size Lg', type: InputTypeEnum::SIZE, default: '$input-btn-font-size-lg', isLocked: true),

        private InputDto $inputBg = new InputDto(label: 'Input Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-bg)'),
        private InputDto $inputDisabledColor = new InputDto(label: 'Input Disabled Color', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $inputDisabledBg = new InputDto(label: 'Input Disabled Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-bg)'),
        private InputDto $inputDisabledBorderColor = new InputDto(label: 'Input Disabled Border Color', type: InputTypeEnum::COLOR, default: 'null', isLocked: true),

        private InputDto $inputColor = new InputDto(label: 'Input Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'),
        private InputDto $inputBorderColor = new InputDto(label: 'Input Border Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}border-color)'),
        private InputDto $inputBorderWidth = new InputDto(label: 'Input Border Width', type: InputTypeEnum::SIZE, default: '$input-btn-border-width', isLocked: true),
        private InputDto $inputBoxShadow = new InputDto(label: 'Input Box Shadow', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}box-shadow-inset)', isLocked: true),

        private InputDto $inputBorderRadius = new InputDto(label: 'Input Border Radius', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius)', isLocked: true),
        private InputDto $inputBorderRadiusSm = new InputDto(label: 'Input Border Radius Sm', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius-sm)', isLocked: true),
        private InputDto $inputBorderRadiusLg = new InputDto(label: 'Input Border Radius Lg', type: InputTypeEnum::SIZE, default: 'var(--#{$prefix}border-radius-lg)', isLocked: true),

        private InputDto $inputFocusBg = new InputDto(label: 'Input Focus Bg', type: InputTypeEnum::COLOR, default: '$input-bg'),
        private InputDto $inputFocusBorderColor = new InputDto(label: 'Input Focus Border Color', type: InputTypeEnum::COLOR, default: 'tint-color($component-active-bg, 50%)', isLocked: true),
        private InputDto $inputFocusColor = new InputDto(label: 'Input Focus Color', type: InputTypeEnum::COLOR, default: '$input-color'),
        private InputDto $inputFocusWidth = new InputDto(label: 'Input Focus Width', type: InputTypeEnum::SIZE, default: '$input-btn-focus-width', isLocked: true),
        private InputDto $inputFocusBoxShadow = new InputDto(label: 'Input Focus Box Shadow', type: InputTypeEnum::STRING, default: '$input-btn-focus-box-shadow', isLocked: true),

        private InputDto $inputPlaceholderColor = new InputDto(label: 'Input Placeholder Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)'),
        private InputDto $inputPlaintextColor = new InputDto(label: 'Input Plaintext Color', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}body-color)'),

        private InputDto $inputHeightBorder = new InputDto(label: 'Input Height Border', type: InputTypeEnum::SIZE, default: 'calc(#{$input-border-width} * 2)', isLocked: true),

        private InputDto $inputHeightInner = new InputDto(label: 'Input Height Inner', type: InputTypeEnum::SIZE, default: 'add($input-line-height * 1em, $input-padding-y * 2)', isLocked: true),
        private InputDto $inputHeightInnerHalf = new InputDto(label: 'Input Height Inner Half', type: InputTypeEnum::SIZE, default: 'add($input-line-height * .5em, $input-padding-y)', isLocked: true),
        private InputDto $inputHeightInnerQuarter = new InputDto(label: 'Input Height Inner Quarter', type: InputTypeEnum::SIZE, default: 'add($input-line-height * .25em, $input-padding-y * .5)', isLocked: true),

        private InputDto $inputHeight = new InputDto(label: 'Input Height', type: InputTypeEnum::SIZE, default: 'add($input-line-height * 1em, add($input-padding-y * 2, $input-height-border, false))', isLocked: true),
        private InputDto $inputHeightSm = new InputDto(label: 'Input Height Sm', type: InputTypeEnum::SIZE, default: 'add($input-line-height * 1em, add($input-padding-y-sm * 2, $input-height-border, false))', isLocked: true),
        private InputDto $inputHeightLg = new InputDto(label: 'Input Height Lg', type: InputTypeEnum::SIZE, default: 'add($input-line-height * 1em, add($input-padding-y-lg * 2, $input-height-border, false))', isLocked: true),

        private InputDto $inputTransition = new InputDto(label: 'Input Transition', type: InputTypeEnum::STRING, default: 'border-color .15s ease-in-out, box-shadow .15s ease-in-out', isLocked: true),

        private InputDto $formColorWidth = new InputDto(label: 'Form Color Width', type: InputTypeEnum::SIZE, default: '3rem', isLocked: true),

        private InputDto $formCheckInputWidth = new InputDto(label: 'Form Check Input Width', type: InputTypeEnum::SIZE, default: '1em', isLocked: true),
        private InputDto $formCheckMinHeight = new InputDto(label: 'Form Check Min Height', type: InputTypeEnum::SIZE, default: '$font-size-base * $line-height-base', isLocked: true),
        private InputDto $formCheckPaddingStart = new InputDto(label: 'Form Check Padding Start', type: InputTypeEnum::SIZE, default: '$form-check-input-width + .5em', isLocked: true),
        private InputDto $formCheckMarginBottom = new InputDto(label: 'Form Check Margin Bottom', type: InputTypeEnum::SIZE, default: '.125rem', isLocked: true),
        private InputDto $formCheckLabelColor = new InputDto(label: 'Form Check Label Color', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $formCheckLabelCursor = new InputDto(label: 'Form Check Label Cursor', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $formCheckTransition = new InputDto(label: 'Form Check Transition', type: InputTypeEnum::STRING, default: 'null', isLocked: true),

        private InputDto $formCheckInputActiveFilter = new InputDto(label: 'Form Check Input Active Filter', type: InputTypeEnum::STRING, default: 'brightness(90%)', isLocked: true),

        private InputDto $formCheckInputBg = new InputDto(label: 'Form Check Input Bg', type: InputTypeEnum::COLOR, default: '$input-bg', isLocked: true),
        private InputDto $formCheckInputBorder = new InputDto(label: 'Form Check Input Border', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}border-width) solid var(--#{$prefix}border-color)', isLocked: true),
        private InputDto $formCheckInputBorderRadius = new InputDto(label: 'Form Check Input Border Radius', type: InputTypeEnum::SIZE, default: '.25em', isLocked: true),
        private InputDto $formCheckRadioBorderRadius = new InputDto(label: 'Form Check Radio Border Radius', type: InputTypeEnum::SIZE, default: '50%', isLocked: true),
        private InputDto $formCheckInputFocusBorder = new InputDto(label: 'Form Check Input Focus Border', type: InputTypeEnum::COLOR, default: '$input-focus-border-color', isLocked: true),
        private InputDto $formCheckInputFocusBoxShadow = new InputDto(label: 'Form Check Input Focus Box Shadow', type: InputTypeEnum::STRING, default: '$focus-ring-box-shadow', isLocked: true),

        private InputDto $formCheckInputCheckedColor = new InputDto(label: 'Form Check Input Checked Color', type: InputTypeEnum::COLOR, default: '$component-active-color'),
        private InputDto $formCheckInputCheckedBgColor = new InputDto(label: 'Form Check Input Checked Bg Color', type: InputTypeEnum::COLOR, default: '$component-active-bg'),
        private InputDto $formCheckInputCheckedBorderColor = new InputDto(label: 'Form Check Input Checked Border Color', type: InputTypeEnum::COLOR, default: '$form-check-input-checked-bg-color', isLocked: true),
        private InputDto $formCheckInputCheckedBgImage = new InputDto(label: 'Form Check Input Checked Bg Image', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 20 20\'><path fill=\'none\' stroke=\'#{$form-check-input-checked-color}\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'3\' d=\'m6 10 3 3 6-6\'/></svg>")', isLocked: true),
        private InputDto $formCheckRadioCheckedBgImage = new InputDto(label: 'Form Check Radio Checked Bg Image', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'-4 -4 8 8\'><circle r=\'2\' fill=\'#{$form-check-input-checked-color}\'/></svg>")', isLocked: true),

        private InputDto $formCheckInputIndeterminateColor = new InputDto(label: 'Form Check Input Indeterminate Color', type: InputTypeEnum::COLOR, default: '$component-active-color'),
        private InputDto $formCheckInputIndeterminateBgColor = new InputDto(label: 'Form Check Input Indeterminate Bg Color', type: InputTypeEnum::COLOR, default: '$component-active-bg'),
        private InputDto $formCheckInputIndeterminateBorderColor = new InputDto(label: 'Form Check Input Indeterminate Border Color', type: InputTypeEnum::COLOR, default: '$form-check-input-indeterminate-bg-color'),
        private InputDto $formCheckInputIndeterminateBgImage = new InputDto(label: 'Form Check Input Indeterminate Bg Image', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 20 20\'><path fill=\'none\' stroke=\'#{$form-check-input-indeterminate-color}\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'3\' d=\'M6 10h8\'/></svg>")', isLocked: true),

        private InputDto $formCheckInputDisabledOpacity = new InputDto(label: 'Form Check Input Disabled Opacity', type: InputTypeEnum::FLOAT, default: '.5', isLocked: true),
        private InputDto $formCheckLabelDisabledOpacity = new InputDto(label: 'Form Check Label Disabled Opacity', type: InputTypeEnum::FLOAT, default: '$form-check-input-disabled-opacity', isLocked: true),
        private InputDto $formCheckBtnCheckDisabledOpacity = new InputDto(label: 'Form Check Btn Check Disabled Opacity', type: InputTypeEnum::FLOAT, default: '$btn-disabled-opacity', isLocked: true),

        private InputDto $formCheckInlineMarginEnd = new InputDto(label: 'Form Check Inline Margin End', type: InputTypeEnum::SIZE, default: '1rem', isLocked: true),

        private InputDto $formSwitchColor = new InputDto(label: 'Form Switch Color', type: InputTypeEnum::COLOR, default: 'rgba($black, .25)', isLocked: true),
        private InputDto $formSwitchWidth = new InputDto(label: 'Form Switch Width', type: InputTypeEnum::SIZE, default: '2em', isLocked: true),
        private InputDto $formSwitchPaddingStart = new InputDto(label: 'Form Switch Padding Start', type: InputTypeEnum::SIZE, default: '$form-switch-width + .5em', isLocked: true),
        private InputDto $formSwitchBgImage = new InputDto(label: 'Form Switch Bg Image', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'-4 -4 8 8\'><circle r=\'3\' fill=\'#{$form-switch-color}\'/></svg>")', isLocked: true),
        private InputDto $formSwitchBorderRadius = new InputDto(label: 'Form Switch Border Radius', type: InputTypeEnum::SIZE, default: '$form-switch-width', isLocked: true),
        private InputDto $formSwitchTransition = new InputDto(label: 'Form Switch Transition', type: InputTypeEnum::STRING, default: 'background-position .15s ease-in-out', isLocked: true),

        private InputDto $formSwitchFocusColor = new InputDto(label: 'Form Switch Focus Color', type: InputTypeEnum::COLOR, default: '$input-focus-border-color'),
        private InputDto $formSwitchFocusBgImage = new InputDto(label: 'Form Switch Focus Bg Image', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'-4 -4 8 8\'><circle r=\'3\' fill=\'#{$form-switch-focus-color}\'/></svg>")', isLocked: true),

        private InputDto $formSwitchCheckedColor = new InputDto(label: 'Form Switch Checked Color', type: InputTypeEnum::COLOR, default: '$component-active-color'),
        private InputDto $formSwitchCheckedBgImage = new InputDto(label: 'Form Switch Checked Bg Image', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'-4 -4 8 8\'><circle r=\'3\' fill=\'#{$form-switch-checked-color}\'/></svg>")', isLocked: true),
        private InputDto $formSwitchCheckedBgPosition = new InputDto(label: 'Form Switch Checked Bg Position', type: InputTypeEnum::STRING, default: 'right center', isLocked: true),

        private InputDto $inputGroupAddonPaddingY = new InputDto(label: 'Input Group Addon Padding Y', type: InputTypeEnum::SIZE, default: '$input-padding-y', isLocked: true),
        private InputDto $inputGroupAddonPaddingX = new InputDto(label: 'Input Group Addon Padding X', type: InputTypeEnum::SIZE, default: '$input-padding-x', isLocked: true),
        private InputDto $inputGroupAddonFontWeight = new InputDto(label: 'Input Group Addon Font Weight', type: InputTypeEnum::STRING, default: '$input-font-weight', isLocked: true),
        private InputDto $inputGroupAddonColor = new InputDto(label: 'Input Group Addon Color', type: InputTypeEnum::COLOR, default: '$input-color'),
        private InputDto $inputGroupAddonBg = new InputDto(label: 'Input Group Addon Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}tertiary-bg)'),
        private InputDto $inputGroupAddonBorderColor = new InputDto(label: 'Input Group Addon Border Color', type: InputTypeEnum::COLOR, default: '$input-border-color'),

        private InputDto $formSelectPaddingY = new InputDto(label: 'Form Select Padding Y', type: InputTypeEnum::SIZE, default: '$input-padding-y', isLocked: true),
        private InputDto $formSelectPaddingX = new InputDto(label: 'Form Select Padding X', type: InputTypeEnum::SIZE, default: '$input-padding-x', isLocked: true),
        private InputDto $formSelectFontFamily = new InputDto(label: 'Form Select Font Family', type: InputTypeEnum::STRING, default: '$input-font-family', isLocked: true),
        private InputDto $formSelectFontSize = new InputDto(label: 'Form Select Font Size', type: InputTypeEnum::SIZE, default: '$input-font-size', isLocked: true),
        private InputDto $formSelectIndicatorPadding = new InputDto(label: 'Form Select Indicator Padding', type: InputTypeEnum::SIZE, default: '$form-select-padding-x * 3', isLocked: true),
        private InputDto $formSelectFontWeight = new InputDto(label: 'Form Select Font Weight', type: InputTypeEnum::STRING, default: '$input-font-weight', isLocked: true),
        private InputDto $formSelectLineHeight = new InputDto(label: 'Form Select Line Height', type: InputTypeEnum::SIZE, default: '$input-line-height', isLocked: true),
        private InputDto $formSelectColor = new InputDto(label: 'Form Select Color', type: InputTypeEnum::COLOR, default: '$input-color', isLocked: true),
        private InputDto $formSelectBg = new InputDto(label: 'Form Select Bg', type: InputTypeEnum::COLOR, default: '$input-bg', isLocked: true),
        private InputDto $formSelectDisabledColor = new InputDto(label: 'Form Select Disabled Color', type: InputTypeEnum::STRING, default: 'null', isLocked: true),
        private InputDto $formSelectDisabledBg = new InputDto(label: 'Form Select Disabled Bg', type: InputTypeEnum::COLOR, default: '$input-disabled-bg', isLocked: true),
        private InputDto $formSelectDisabledBorderColor = new InputDto(label: 'Form Select Disabled Border Color', type: InputTypeEnum::STRING, default: '$input-disabled-border-color', isLocked: true),
        private InputDto $formSelectBgPosition = new InputDto(label: 'Form Select Bg Position', type: InputTypeEnum::STRING, default: 'right $form-select-padding-x center', isLocked: true),
        private InputDto $formSelectBgSize = new InputDto(label: 'Form Select Bg Size', type: InputTypeEnum::STRING, default: '16px 12px', isLocked: true),
        private InputDto $formSelectIndicatorColor = new InputDto(label: 'Form Select Indicator Color', type: InputTypeEnum::COLOR, default: '$gray-800'),
        private InputDto $formSelectIndicator = new InputDto(label: 'Form Select Indicator', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'><path fill=\'none\' stroke=\'#{$form-select-indicator-color}\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'m2 5 6 6 6-6\'/></svg>")', isLocked: true),

        private InputDto $formSelectFeedbackIconPaddingEnd = new InputDto(label: 'Form Select Feedback Icon Padding End', type: InputTypeEnum::SIZE, default: '$form-select-padding-x * 2.5 + $form-select-indicator-padding', isLocked: true),
        private InputDto $formSelectFeedbackIconPosition = new InputDto(label: 'Form Select Feedback Icon Position', type: InputTypeEnum::STRING, default: 'center right $form-select-indicator-padding', isLocked: true),
        private InputDto $formSelectFeedbackIconSize = new InputDto(label: 'Form Select Feedback Icon Size', type: InputTypeEnum::SIZE, default: '$input-height-inner-half $input-height-inner-half', isLocked: true),

        private InputDto $formSelectBorderWidth = new InputDto(label: 'Form Select Border Width', type: InputTypeEnum::SIZE, default: '$input-border-width', isLocked: true),
        private InputDto $formSelectBorderColor = new InputDto(label: 'Form Select Border Color', type: InputTypeEnum::COLOR, default: '$input-border-color'),
        private InputDto $formSelectBorderRadius = new InputDto(label: 'Form Select Border Radius', type: InputTypeEnum::SIZE, default: '$input-border-radius'),
        private InputDto $formSelectBoxShadow = new InputDto(label: 'Form Select Box Shadow', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}box-shadow-inset)', isLocked: true),

        private InputDto $formSelectFocusBorderColor = new InputDto(label: 'Form Select Focus Border Color', type: InputTypeEnum::COLOR, default: '$input-focus-border-color'),
        private InputDto $formSelectFocusWidth = new InputDto(label: 'Form Select Focus Width', type: InputTypeEnum::SIZE, default: '$input-focus-width'),
        private InputDto $formSelectFocusBoxShadow = new InputDto(label: 'Form Select Focus Box Shadow', type: InputTypeEnum::STRING, default: '0 0 0 $form-select-focus-width $input-btn-focus-color', isLocked: true),

        private InputDto $formSelectPaddingYSm = new InputDto(label: 'Form Select Padding Y Sm', type: InputTypeEnum::SIZE, default: '$input-padding-y-sm', isLocked: true),
        private InputDto $formSelectPaddingXSm = new InputDto(label: 'Form Select Padding X Sm', type: InputTypeEnum::SIZE, default: '$input-padding-x-sm', isLocked: true),
        private InputDto $formSelectFontSizeSm = new InputDto(label: 'Form Select Font Size Sm', type: InputTypeEnum::SIZE, default: '$input-font-size-sm', isLocked: true),
        private InputDto $formSelectBorderRadiusSm = new InputDto(label: 'Form Select Border Radius Sm', type: InputTypeEnum::SIZE, default: '$input-border-radius-sm', isLocked: true),

        private InputDto $formSelectPaddingYLg = new InputDto(label: 'Form Select Padding Y Lg', type: InputTypeEnum::SIZE, default: '$input-padding-y-lg', isLocked: true),
        private InputDto $formSelectPaddingXLg = new InputDto(label: 'Form Select Padding X Lg', type: InputTypeEnum::SIZE, default: '$input-padding-x-lg', isLocked: true),
        private InputDto $formSelectFontSizeLg = new InputDto(label: 'Form Select Font Size Lg', type: InputTypeEnum::SIZE, default: '$input-font-size-lg', isLocked: true),
        private InputDto $formSelectBorderRadiusLg = new InputDto(label: 'Form Select Border Radius Lg', type: InputTypeEnum::SIZE, default: '$input-border-radius-lg', isLocked: true),

        private InputDto $formSelectTransition = new InputDto(label: 'Form Select Transition', type: InputTypeEnum::STRING, default: '$input-transition', isLocked: true),

        private InputDto $formRangeTrackWidth = new InputDto(label: 'Form Range Track Width', type: InputTypeEnum::SIZE, default: '100%', isLocked: true),
        private InputDto $formRangeTrackHeight = new InputDto(label: 'Form Range Track Height', type: InputTypeEnum::SIZE, default: '.5rem', isLocked: true),
        private InputDto $formRangeTrackCursor = new InputDto(label: 'Form Range Track Cursor', type: InputTypeEnum::STRING, default: 'pointer', isLocked: true),
        private InputDto $formRangeTrackBg = new InputDto(label: 'Form Range Track Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-bg)'),
        private InputDto $formRangeTrackBorderRadius = new InputDto(label: 'Form Range Track Border Radius', type: InputTypeEnum::SIZE, default: '1rem', isLocked: true),
        private InputDto $formRangeTrackBoxShadow = new InputDto(label: 'Form Range Track Box Shadow', type: InputTypeEnum::STRING, default: 'var(--#{$prefix}box-shadow-inset)', isLocked: true),

        private InputDto $formRangeThumbWidth = new InputDto(label: 'Form Range Thumb Width', type: InputTypeEnum::SIZE, default: '1rem', isLocked: true),
        private InputDto $formRangeThumbHeight = new InputDto(label: 'Form Range Thumb Height', type: InputTypeEnum::SIZE, default: '$form-range-thumb-width', isLocked: true),
        private InputDto $formRangeThumbBg = new InputDto(label: 'Form Range Thumb Bg', type: InputTypeEnum::COLOR, default: '$component-active-bg'),
        private InputDto $formRangeThumbBorder = new InputDto(label: 'Form Range Thumb Border', type: InputTypeEnum::INTEGER, default: '0', isLocked: true),
        private InputDto $formRangeThumbBorderRadius = new InputDto(label: 'Form Range Thumb Border Radius', type: InputTypeEnum::SIZE, default: '1rem', isLocked: true),
        private InputDto $formRangeThumbBoxShadow = new InputDto(label: 'Form Range Thumb Box Shadow', type: InputTypeEnum::STRING, default: '0 .1rem .25rem rgba($black, .1)', isLocked: true),
        private InputDto $formRangeThumbFocusBoxShadow = new InputDto(label: 'Form Range Thumb Focus Box Shadow', type: InputTypeEnum::STRING, default: '0 0 0 1px $body-bg, $input-focus-box-shadow', isLocked: true),
        private InputDto $formRangeThumbFocusBoxShadowWidth = new InputDto(label: 'Form Range Thumb Focus Box Shadow Width', type: InputTypeEnum::SIZE, default: '$input-focus-width', isLocked: true), // For focus box shadow issue in Edge
        private InputDto $formRangeThumbActiveBg = new InputDto(label: 'Form Range Thumb Active Bg', type: InputTypeEnum::COLOR, default: 'tint-color($component-active-bg, 70%)', isLocked: true),
        private InputDto $formRangeThumbDisabledBg = new InputDto(label: 'Form Range Thumb Disabled Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-color)', isLocked: true),
        private InputDto $formRangeThumbTransition = new InputDto(label: 'Form Range Thumb Transition', type: InputTypeEnum::STRING, default: 'background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out', isLocked: true),

        private InputDto $formFileButtonColor = new InputDto(label: 'Form File Button Color', type: InputTypeEnum::COLOR, default: '$input-color'),
        private InputDto $formFileButtonBg = new InputDto(label: 'Form File Button Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}tertiary-bg)'),
        private InputDto $formFileButtonHoverBg = new InputDto(label: 'Form File Button Hover Bg', type: InputTypeEnum::COLOR, default: 'var(--#{$prefix}secondary-bg)'),

        private InputDto $formFloatingHeight = new InputDto(label: 'Form Floating Height', type: InputTypeEnum::SIZE, default: 'add(3.5rem, $input-height-border)', isLocked: true),
        private InputDto $formFloatingLineHeight = new InputDto(label: 'Form Floating Line Height', type: InputTypeEnum::FLOAT, default: '1.25', isLocked: true),
        private InputDto $formFloatingPaddingX = new InputDto(label: 'Form Floating Padding X', type: InputTypeEnum::SIZE, default: '$input-padding-x', isLocked: true),
        private InputDto $formFloatingPaddingY = new InputDto(label: 'Form Floating Padding Y', type: InputTypeEnum::SIZE, default: '1rem', isLocked: true),
        private InputDto $formFloatingInputPaddingT = new InputDto(label: 'Form Floating Input Padding T', type: InputTypeEnum::SIZE, default: '1.625rem', isLocked: true),
        private InputDto $formFloatingInputPaddingB = new InputDto(label: 'Form Floating Input Padding B', type: InputTypeEnum::SIZE, default: '.625rem', isLocked: true),
        private InputDto $formFloatingLabelHeight = new InputDto(label: 'Form Floating Label Height', type: InputTypeEnum::SIZE, default: '1.5em', isLocked: true),
        private InputDto $formFloatingLabelOpacity = new InputDto(label: 'Form Floating Label Opacity', type: InputTypeEnum::FLOAT, default: '.65', isLocked: true),
        private InputDto $formFloatingLabelTransform = new InputDto(label: 'Form Floating Label Transform', type: InputTypeEnum::STRING, default: 'scale(.85) translateY(-.5rem) translateX(.15rem)', isLocked: true),
        private InputDto $formFloatingLabelDisabledColor = new InputDto(label: 'Form Floating Label Disabled Color', type: InputTypeEnum::COLOR, default: '$gray-600'),
        private InputDto $formFloatingTransition = new InputDto(label: 'Form Floating Transition', type: InputTypeEnum::STRING, default: 'opacity .1s ease-in-out, transform .1s ease-in-out', isLocked: true),

        private InputDto $formFeedbackMarginTop = new InputDto(label: 'Form Feedback Margin Top', type: InputTypeEnum::SIZE, default: '$form-text-margin-top', isLocked: true),
        private InputDto $formFeedbackFontSize = new InputDto(label: 'Form Feedback Font Size', type: InputTypeEnum::SIZE, default: '$form-text-font-size', isLocked: true),
        private InputDto $formFeedbackFontStyle = new InputDto(label: 'Form Feedback Font Style', type: InputTypeEnum::STRING, default: '$form-text-font-style', isLocked: true),
        private InputDto $formFeedbackValidColor = new InputDto(label: 'Form Feedback Valid Color', type: InputTypeEnum::COLOR, default: '$success'),
        private InputDto $formFeedbackInvalidColor = new InputDto(label: 'Form Feedback Invalid Color', type: InputTypeEnum::COLOR, default: '$danger'),

        private InputDto $formFeedbackIconValidColor = new InputDto(label: 'Form Feedback Icon Valid Color', type: InputTypeEnum::COLOR, default: '$form-feedback-valid-color'),
        private InputDto $formFeedbackIconValid = new InputDto(label: 'Form Feedback Icon Valid', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 8 8\'><path fill=\'#{$form-feedback-icon-valid-color}\' d=\'M2.3 6.73.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z\'/></svg>")', isLocked: true),
        private InputDto $formFeedbackIconInvalidColor = new InputDto(label: 'Form Feedback Icon Invalid Color', type: InputTypeEnum::COLOR, default: '$form-feedback-invalid-color'),
        private InputDto $formFeedbackIconInvalid = new InputDto(label: 'Form Feedback Icon Invalid', type: InputTypeEnum::STRING, default: 'url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 12 12\' width=\'12\' height=\'12\' fill=\'none\' stroke=\'#{$form-feedback-icon-invalid-color}\'><circle cx=\'6\' cy=\'6\' r=\'4.5\'/><path stroke-linejoin=\'round\' d=\'M5.8 3.6h.4L6 6.5z\'/><circle cx=\'6\' cy=\'8.2\' r=\'.6\' fill=\'#{$form-feedback-icon-invalid-color}\' stroke=\'none\'/></svg>")', isLocked: true),

        private InputDto $formValidColor = new InputDto(label: 'Form Valid Color', type: InputTypeEnum::COLOR, default: '$form-feedback-valid-color'),
        private InputDto $formValidBorderColor = new InputDto(label: 'Form Valid Border Color', type: InputTypeEnum::COLOR, default: '$form-feedback-valid-color'),
        private InputDto $formInvalidColor = new InputDto(label: 'Form Invalid Color', type: InputTypeEnum::COLOR, default: '$form-feedback-invalid-color'),
        private InputDto $formInvalidBorderColor = new InputDto(label: 'Form Invalid Border Color', type: InputTypeEnum::COLOR, default: '$form-feedback-invalid-color')
    )
    {
    }

    public function getFormTextMarginTop(): InputDto
    {
        return $this->formTextMarginTop;
    }

    public function getFormTextFontSize(): InputDto
    {
        return $this->formTextFontSize;
    }

    public function getFormTextFontStyle(): InputDto
    {
        return $this->formTextFontStyle;
    }

    public function getFormTextFontWeight(): InputDto
    {
        return $this->formTextFontWeight;
    }

    public function getFormTextColor(): InputDto
    {
        return $this->formTextColor;
    }

    public function getFormLabelMarginBottom(): InputDto
    {
        return $this->formLabelMarginBottom;
    }

    public function getFormLabelFontSize(): InputDto
    {
        return $this->formLabelFontSize;
    }

    public function getFormLabelFontStyle(): InputDto
    {
        return $this->formLabelFontStyle;
    }

    public function getFormLabelFontWeight(): InputDto
    {
        return $this->formLabelFontWeight;
    }

    public function getFormLabelColor(): InputDto
    {
        return $this->formLabelColor;
    }

    public function getInputPaddingY(): InputDto
    {
        return $this->inputPaddingY;
    }

    public function getInputPaddingX(): InputDto
    {
        return $this->inputPaddingX;
    }

    public function getInputFontFamily(): InputDto
    {
        return $this->inputFontFamily;
    }

    public function getInputFontSize(): InputDto
    {
        return $this->inputFontSize;
    }

    public function getInputFontWeight(): InputDto
    {
        return $this->inputFontWeight;
    }

    public function getInputLineHeight(): InputDto
    {
        return $this->inputLineHeight;
    }

    public function getInputPaddingYSm(): InputDto
    {
        return $this->inputPaddingYSm;
    }

    public function getInputPaddingXSm(): InputDto
    {
        return $this->inputPaddingXSm;
    }

    public function getInputFontSizeSm(): InputDto
    {
        return $this->inputFontSizeSm;
    }

    public function getInputPaddingYLg(): InputDto
    {
        return $this->inputPaddingYLg;
    }

    public function getInputPaddingXLg(): InputDto
    {
        return $this->inputPaddingXLg;
    }

    public function getInputFontSizeLg(): InputDto
    {
        return $this->inputFontSizeLg;
    }

    public function getInputBg(): InputDto
    {
        return $this->inputBg;
    }

    public function getInputDisabledColor(): InputDto
    {
        return $this->inputDisabledColor;
    }

    public function getInputDisabledBg(): InputDto
    {
        return $this->inputDisabledBg;
    }

    public function getInputDisabledBorderColor(): InputDto
    {
        return $this->inputDisabledBorderColor;
    }

    public function getInputColor(): InputDto
    {
        return $this->inputColor;
    }

    public function getInputBorderColor(): InputDto
    {
        return $this->inputBorderColor;
    }

    public function getInputBorderWidth(): InputDto
    {
        return $this->inputBorderWidth;
    }

    public function getInputBoxShadow(): InputDto
    {
        return $this->inputBoxShadow;
    }

    public function getInputBorderRadius(): InputDto
    {
        return $this->inputBorderRadius;
    }

    public function getInputBorderRadiusSm(): InputDto
    {
        return $this->inputBorderRadiusSm;
    }

    public function getInputBorderRadiusLg(): InputDto
    {
        return $this->inputBorderRadiusLg;
    }

    public function getInputFocusBg(): InputDto
    {
        return $this->inputFocusBg;
    }

    public function getInputFocusBorderColor(): InputDto
    {
        return $this->inputFocusBorderColor;
    }

    public function getInputFocusColor(): InputDto
    {
        return $this->inputFocusColor;
    }

    public function getInputFocusWidth(): InputDto
    {
        return $this->inputFocusWidth;
    }

    public function getInputFocusBoxShadow(): InputDto
    {
        return $this->inputFocusBoxShadow;
    }

    public function getInputPlaceholderColor(): InputDto
    {
        return $this->inputPlaceholderColor;
    }

    public function getInputPlaintextColor(): InputDto
    {
        return $this->inputPlaintextColor;
    }

    public function getInputHeightBorder(): InputDto
    {
        return $this->inputHeightBorder;
    }

    public function getInputHeightInner(): InputDto
    {
        return $this->inputHeightInner;
    }

    public function getInputHeightInnerHalf(): InputDto
    {
        return $this->inputHeightInnerHalf;
    }

    public function getInputHeightInnerQuarter(): InputDto
    {
        return $this->inputHeightInnerQuarter;
    }

    public function getInputHeight(): InputDto
    {
        return $this->inputHeight;
    }

    public function getInputHeightSm(): InputDto
    {
        return $this->inputHeightSm;
    }

    public function getInputHeightLg(): InputDto
    {
        return $this->inputHeightLg;
    }

    public function getInputTransition(): InputDto
    {
        return $this->inputTransition;
    }

    public function getFormColorWidth(): InputDto
    {
        return $this->formColorWidth;
    }

    public function getFormCheckInputWidth(): InputDto
    {
        return $this->formCheckInputWidth;
    }

    public function getFormCheckMinHeight(): InputDto
    {
        return $this->formCheckMinHeight;
    }

    public function getFormCheckPaddingStart(): InputDto
    {
        return $this->formCheckPaddingStart;
    }

    public function getFormCheckMarginBottom(): InputDto
    {
        return $this->formCheckMarginBottom;
    }

    public function getFormCheckLabelColor(): InputDto
    {
        return $this->formCheckLabelColor;
    }

    public function getFormCheckLabelCursor(): InputDto
    {
        return $this->formCheckLabelCursor;
    }

    public function getFormCheckTransition(): InputDto
    {
        return $this->formCheckTransition;
    }

    public function getFormCheckInputActiveFilter(): InputDto
    {
        return $this->formCheckInputActiveFilter;
    }

    public function getFormCheckInputBg(): InputDto
    {
        return $this->formCheckInputBg;
    }

    public function getFormCheckInputBorder(): InputDto
    {
        return $this->formCheckInputBorder;
    }

    public function getFormCheckInputBorderRadius(): InputDto
    {
        return $this->formCheckInputBorderRadius;
    }

    public function getFormCheckRadioBorderRadius(): InputDto
    {
        return $this->formCheckRadioBorderRadius;
    }

    public function getFormCheckInputFocusBorder(): InputDto
    {
        return $this->formCheckInputFocusBorder;
    }

    public function getFormCheckInputFocusBoxShadow(): InputDto
    {
        return $this->formCheckInputFocusBoxShadow;
    }

    public function getFormCheckInputCheckedColor(): InputDto
    {
        return $this->formCheckInputCheckedColor;
    }

    public function getFormCheckInputCheckedBgColor(): InputDto
    {
        return $this->formCheckInputCheckedBgColor;
    }

    public function getFormCheckInputCheckedBorderColor(): InputDto
    {
        return $this->formCheckInputCheckedBorderColor;
    }

    public function getFormCheckInputCheckedBgImage(): InputDto
    {
        return $this->formCheckInputCheckedBgImage;
    }

    public function getFormCheckRadioCheckedBgImage(): InputDto
    {
        return $this->formCheckRadioCheckedBgImage;
    }

    public function getFormCheckInputIndeterminateColor(): InputDto
    {
        return $this->formCheckInputIndeterminateColor;
    }

    public function getFormCheckInputIndeterminateBgColor(): InputDto
    {
        return $this->formCheckInputIndeterminateBgColor;
    }

    public function getFormCheckInputIndeterminateBorderColor(): InputDto
    {
        return $this->formCheckInputIndeterminateBorderColor;
    }

    public function getFormCheckInputIndeterminateBgImage(): InputDto
    {
        return $this->formCheckInputIndeterminateBgImage;
    }

    public function getFormCheckInputDisabledOpacity(): InputDto
    {
        return $this->formCheckInputDisabledOpacity;
    }

    public function getFormCheckLabelDisabledOpacity(): InputDto
    {
        return $this->formCheckLabelDisabledOpacity;
    }

    public function getFormCheckBtnCheckDisabledOpacity(): InputDto
    {
        return $this->formCheckBtnCheckDisabledOpacity;
    }

    public function getFormCheckInlineMarginEnd(): InputDto
    {
        return $this->formCheckInlineMarginEnd;
    }

    public function getFormSwitchColor(): InputDto
    {
        return $this->formSwitchColor;
    }

    public function getFormSwitchWidth(): InputDto
    {
        return $this->formSwitchWidth;
    }

    public function getFormSwitchPaddingStart(): InputDto
    {
        return $this->formSwitchPaddingStart;
    }

    public function getFormSwitchBgImage(): InputDto
    {
        return $this->formSwitchBgImage;
    }

    public function getFormSwitchBorderRadius(): InputDto
    {
        return $this->formSwitchBorderRadius;
    }

    public function getFormSwitchTransition(): InputDto
    {
        return $this->formSwitchTransition;
    }

    public function getFormSwitchFocusColor(): InputDto
    {
        return $this->formSwitchFocusColor;
    }

    public function getFormSwitchFocusBgImage(): InputDto
    {
        return $this->formSwitchFocusBgImage;
    }

    public function getFormSwitchCheckedColor(): InputDto
    {
        return $this->formSwitchCheckedColor;
    }

    public function getFormSwitchCheckedBgImage(): InputDto
    {
        return $this->formSwitchCheckedBgImage;
    }

    public function getFormSwitchCheckedBgPosition(): InputDto
    {
        return $this->formSwitchCheckedBgPosition;
    }

    public function getInputGroupAddonPaddingY(): InputDto
    {
        return $this->inputGroupAddonPaddingY;
    }

    public function getInputGroupAddonPaddingX(): InputDto
    {
        return $this->inputGroupAddonPaddingX;
    }

    public function getInputGroupAddonFontWeight(): InputDto
    {
        return $this->inputGroupAddonFontWeight;
    }

    public function getInputGroupAddonColor(): InputDto
    {
        return $this->inputGroupAddonColor;
    }

    public function getInputGroupAddonBg(): InputDto
    {
        return $this->inputGroupAddonBg;
    }

    public function getInputGroupAddonBorderColor(): InputDto
    {
        return $this->inputGroupAddonBorderColor;
    }

    public function getFormSelectPaddingY(): InputDto
    {
        return $this->formSelectPaddingY;
    }

    public function getFormSelectPaddingX(): InputDto
    {
        return $this->formSelectPaddingX;
    }

    public function getFormSelectFontFamily(): InputDto
    {
        return $this->formSelectFontFamily;
    }

    public function getFormSelectFontSize(): InputDto
    {
        return $this->formSelectFontSize;
    }

    public function getFormSelectIndicatorPadding(): InputDto
    {
        return $this->formSelectIndicatorPadding;
    }

    public function getFormSelectFontWeight(): InputDto
    {
        return $this->formSelectFontWeight;
    }

    public function getFormSelectLineHeight(): InputDto
    {
        return $this->formSelectLineHeight;
    }

    public function getFormSelectColor(): InputDto
    {
        return $this->formSelectColor;
    }

    public function getFormSelectBg(): InputDto
    {
        return $this->formSelectBg;
    }

    public function getFormSelectDisabledColor(): InputDto
    {
        return $this->formSelectDisabledColor;
    }

    public function getFormSelectDisabledBg(): InputDto
    {
        return $this->formSelectDisabledBg;
    }

    public function getFormSelectDisabledBorderColor(): InputDto
    {
        return $this->formSelectDisabledBorderColor;
    }

    public function getFormSelectBgPosition(): InputDto
    {
        return $this->formSelectBgPosition;
    }

    public function getFormSelectBgSize(): InputDto
    {
        return $this->formSelectBgSize;
    }

    public function getFormSelectIndicatorColor(): InputDto
    {
        return $this->formSelectIndicatorColor;
    }

    public function getFormSelectIndicator(): InputDto
    {
        return $this->formSelectIndicator;
    }

    public function getFormSelectFeedbackIconPaddingEnd(): InputDto
    {
        return $this->formSelectFeedbackIconPaddingEnd;
    }

    public function getFormSelectFeedbackIconPosition(): InputDto
    {
        return $this->formSelectFeedbackIconPosition;
    }

    public function getFormSelectFeedbackIconSize(): InputDto
    {
        return $this->formSelectFeedbackIconSize;
    }

    public function getFormSelectBorderWidth(): InputDto
    {
        return $this->formSelectBorderWidth;
    }

    public function getFormSelectBorderColor(): InputDto
    {
        return $this->formSelectBorderColor;
    }

    public function getFormSelectBorderRadius(): InputDto
    {
        return $this->formSelectBorderRadius;
    }

    public function getFormSelectBoxShadow(): InputDto
    {
        return $this->formSelectBoxShadow;
    }

    public function getFormSelectFocusBorderColor(): InputDto
    {
        return $this->formSelectFocusBorderColor;
    }

    public function getFormSelectFocusWidth(): InputDto
    {
        return $this->formSelectFocusWidth;
    }

    public function getFormSelectFocusBoxShadow(): InputDto
    {
        return $this->formSelectFocusBoxShadow;
    }

    public function getFormSelectPaddingYSm(): InputDto
    {
        return $this->formSelectPaddingYSm;
    }

    public function getFormSelectPaddingXSm(): InputDto
    {
        return $this->formSelectPaddingXSm;
    }

    public function getFormSelectFontSizeSm(): InputDto
    {
        return $this->formSelectFontSizeSm;
    }

    public function getFormSelectBorderRadiusSm(): InputDto
    {
        return $this->formSelectBorderRadiusSm;
    }

    public function getFormSelectPaddingYLg(): InputDto
    {
        return $this->formSelectPaddingYLg;
    }

    public function getFormSelectPaddingXLg(): InputDto
    {
        return $this->formSelectPaddingXLg;
    }

    public function getFormSelectFontSizeLg(): InputDto
    {
        return $this->formSelectFontSizeLg;
    }

    public function getFormSelectBorderRadiusLg(): InputDto
    {
        return $this->formSelectBorderRadiusLg;
    }

    public function getFormSelectTransition(): InputDto
    {
        return $this->formSelectTransition;
    }

    public function getFormRangeTrackWidth(): InputDto
    {
        return $this->formRangeTrackWidth;
    }

    public function getFormRangeTrackHeight(): InputDto
    {
        return $this->formRangeTrackHeight;
    }

    public function getFormRangeTrackCursor(): InputDto
    {
        return $this->formRangeTrackCursor;
    }

    public function getFormRangeTrackBg(): InputDto
    {
        return $this->formRangeTrackBg;
    }

    public function getFormRangeTrackBorderRadius(): InputDto
    {
        return $this->formRangeTrackBorderRadius;
    }

    public function getFormRangeTrackBoxShadow(): InputDto
    {
        return $this->formRangeTrackBoxShadow;
    }

    public function getFormRangeThumbWidth(): InputDto
    {
        return $this->formRangeThumbWidth;
    }

    public function getFormRangeThumbHeight(): InputDto
    {
        return $this->formRangeThumbHeight;
    }

    public function getFormRangeThumbBg(): InputDto
    {
        return $this->formRangeThumbBg;
    }

    public function getFormRangeThumbBorder(): InputDto
    {
        return $this->formRangeThumbBorder;
    }

    public function getFormRangeThumbBorderRadius(): InputDto
    {
        return $this->formRangeThumbBorderRadius;
    }

    public function getFormRangeThumbBoxShadow(): InputDto
    {
        return $this->formRangeThumbBoxShadow;
    }

    public function getFormRangeThumbFocusBoxShadow(): InputDto
    {
        return $this->formRangeThumbFocusBoxShadow;
    }

    public function getFormRangeThumbFocusBoxShadowWidth(): InputDto
    {
        return $this->formRangeThumbFocusBoxShadowWidth;
    }

    public function getFormRangeThumbActiveBg(): InputDto
    {
        return $this->formRangeThumbActiveBg;
    }

    public function getFormRangeThumbDisabledBg(): InputDto
    {
        return $this->formRangeThumbDisabledBg;
    }

    public function getFormRangeThumbTransition(): InputDto
    {
        return $this->formRangeThumbTransition;
    }

    public function getFormFileButtonColor(): InputDto
    {
        return $this->formFileButtonColor;
    }

    public function getFormFileButtonBg(): InputDto
    {
        return $this->formFileButtonBg;
    }

    public function getFormFileButtonHoverBg(): InputDto
    {
        return $this->formFileButtonHoverBg;
    }

    public function getFormFloatingHeight(): InputDto
    {
        return $this->formFloatingHeight;
    }

    public function getFormFloatingLineHeight(): InputDto
    {
        return $this->formFloatingLineHeight;
    }

    public function getFormFloatingPaddingX(): InputDto
    {
        return $this->formFloatingPaddingX;
    }

    public function getFormFloatingPaddingY(): InputDto
    {
        return $this->formFloatingPaddingY;
    }

    public function getFormFloatingInputPaddingT(): InputDto
    {
        return $this->formFloatingInputPaddingT;
    }

    public function getFormFloatingInputPaddingB(): InputDto
    {
        return $this->formFloatingInputPaddingB;
    }

    public function getFormFloatingLabelHeight(): InputDto
    {
        return $this->formFloatingLabelHeight;
    }

    public function getFormFloatingLabelOpacity(): InputDto
    {
        return $this->formFloatingLabelOpacity;
    }

    public function getFormFloatingLabelTransform(): InputDto
    {
        return $this->formFloatingLabelTransform;
    }

    public function getFormFloatingLabelDisabledColor(): InputDto
    {
        return $this->formFloatingLabelDisabledColor;
    }

    public function getFormFloatingTransition(): InputDto
    {
        return $this->formFloatingTransition;
    }

    public function getFormFeedbackMarginTop(): InputDto
    {
        return $this->formFeedbackMarginTop;
    }

    public function getFormFeedbackFontSize(): InputDto
    {
        return $this->formFeedbackFontSize;
    }

    public function getFormFeedbackFontStyle(): InputDto
    {
        return $this->formFeedbackFontStyle;
    }

    public function getFormFeedbackValidColor(): InputDto
    {
        return $this->formFeedbackValidColor;
    }

    public function getFormFeedbackInvalidColor(): InputDto
    {
        return $this->formFeedbackInvalidColor;
    }

    public function getFormFeedbackIconValidColor(): InputDto
    {
        return $this->formFeedbackIconValidColor;
    }

    public function getFormFeedbackIconValid(): InputDto
    {
        return $this->formFeedbackIconValid;
    }

    public function getFormFeedbackIconInvalidColor(): InputDto
    {
        return $this->formFeedbackIconInvalidColor;
    }

    public function getFormFeedbackIconInvalid(): InputDto
    {
        return $this->formFeedbackIconInvalid;
    }

    public function getFormValidColor(): InputDto
    {
        return $this->formValidColor;
    }

    public function getFormValidBorderColor(): InputDto
    {
        return $this->formValidBorderColor;
    }

    public function getFormInvalidColor(): InputDto
    {
        return $this->formInvalidColor;
    }

    public function getFormInvalidBorderColor(): InputDto
    {
        return $this->formInvalidBorderColor;
    }

}
