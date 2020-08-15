<template>
    <div>
        <!---
        You can use the `control` object - basically, it's main data of your custom control field
        Because I had 2 more specific config data (isChecked & switchColor)
        So I added 2 more fields below to config it.
        --->
        <div :class="styles.FORM.FORM_GROUP">
            <label>
                Initialize Checked?
                <input type="checkbox" v-model="control.isChecked">
            </label>
        </div>

        <div :class="styles.FORM.FORM_GROUP">
            <label>
                Switch Color (HEX Color)
            </label>
            <input type="text"
                   :class="styles.FORM.FORM_CONTROL"
                   v-model="control.switchColor"
            >
        </div>
    </div>
</template>

<script>
    import { BaseControlConfigSkeleton } from 'v-form-builder'

    export default {
        name: "SwitchConfigView",
        extends: BaseControlConfigSkeleton,
    }
</script>
