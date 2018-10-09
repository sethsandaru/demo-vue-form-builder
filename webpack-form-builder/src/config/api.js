
export function save_form(title, formData) {
    return $.post(api_url + "InsertForm", {title, formData: JSON.stringify(formData)}).fail(err => {
        SethPhatToaster.error("Failed to save form config, please try again");
    });
}

export function get_form(id) {
    return $.getJSON(api_url + "GetFormData/" + id);
}

export function get_all_form() {
    return $.getJSON(api_url + "GetAllForm");
}

export function update_form(id, title, formData) {
    return $.post(api_url + "UpdateForm/" + id, {title, formData: JSON.stringify(formData)}).fail(err => {
        SethPhatToaster.error("Failed to save form config, please try again");
    });
}