<template>
    <input
        :id="control.uniqueId"
        :name="control.name || control.uniqueId"

        type="checkbox"

        @change="updateValue($event.target.checked)"
    />
</template>

<script>
    import {BaseControlSkeleton} from 'v-form-builder'
    import Switchery from '../../assets/switchery.min'
    import '../../assets/switch.css'

    export default {
        name: "SwitchControl",
        extends: BaseControlSkeleton,

        data: () => ({
            switcherInstance: null,
        }),

        watch: {
            /**
             * Watcher for Configuration - FormBuilder Mode
             * @param val
             */
            "control.switchColor": function(val) {
                this.switcherInstance.options.color = val

                if (this.switcherInstance.isChecked()) {
                    this.switcherInstance.switcher.style.backgroundColor = val
                    this.switcherInstance.switcher.style.borderColor = val
                }
            }
        },

        mounted() {
            // Initialize Checked
            if (this.control.isChecked) {
                this.$el.checked = true
                this.updateValue(true)
            }

            // CREATE UI CONTROL
            this.switcherInstance = new Switchery(this.$el, {
                color: this.control.switchColor
            })
        },

        beforeDestroy() {
            this.switcherInstance.destroy()
        }
    }
</script>
