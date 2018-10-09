import {AppConfig} from "@/config/app_config";

export function save_form(title, formData) {
    return $.post(AppConfig.api_url + "", {title, formData: JSON.stringify(formData)}).fail(err => {
        SethPhatToaster.error("Failed to save form config, please try again");
    });
}

export function get_form() {
    return $.getJSON(AppConfig.api_url + "");
}
