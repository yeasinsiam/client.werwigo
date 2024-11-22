export default {
    init() {
        $(document).ready(() => {
            // _________________ Init File Preview ____________________\\
            $("#profile-avatar-field-wrapper input").change(function () {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#profile-avatar-field-wrapper img").attr(
                        "src",
                        e.target.result
                    );
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);
            });
        });
    },
};
