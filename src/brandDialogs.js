const brandEditButtons = $(".brand-edit");
const editIdInput = $("#edit-id") ;
const editNameInput = $("#edit-name");
const editDialogBtnClose = $("#close-edit-dialog");
const editDialog = $("#edit-dialog");

const brandAddButton = $("#add-brand-button");
const addNameInput = $("#add-name");
const addDialogBtnClose = $("#close-add-dialog");
const addDialog = $("#add-dialog");

for (var i = 0; i < brandEditButtons.length; i++) {
    brandEditButtons[i].addEventListener('click', (e) =>{
        const targetElement = e.target || e.srcElement;
        const values = targetElement.id.split("-");
        const id = values[0];
        const name = values[1];
        editIdInput.val(id);
        editNameInput.val(name);
        editDialog.show();
    });
}

editDialogBtnClose.click(function () {
    editIdInput.val('');
    editNameInput.val('');
    editDialog.hide();
});

brandAddButton.click(function () {
    addNameInput.val('');
    addDialog.show();
});

addDialogBtnClose.click(function () {
    addNameInput.val('');
    addDialog.hide();
});