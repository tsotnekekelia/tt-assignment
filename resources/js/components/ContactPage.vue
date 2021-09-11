<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-12 p-5 bg-purple">
                <ContactInformation/>
            </div>
            <div class="col-md-8 col-sm-12 p-5">
                <ContactForm/>
            </div>
        </div>
    </div>
</template>

<script>
import ContactInformation from "./ContactInformation";
import ContactForm from "./ContactForm";

export default {
    components: {
        ContactInformation,
        ContactForm
    }
}
</script>
<style>
.bg-purple {
    background-color: #9561e2
}
</style>
