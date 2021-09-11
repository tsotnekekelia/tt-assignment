<template>
    <div>
        <div v-if="show">
            <h5 class="mb-4">Send us a message</h5>
            <form action="" class="needs-validation" @submit="submit">
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <ContactFormInput :disabled="loading" :item="form.first_name"/>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <ContactFormInput :disabled="loading" :item="form.last_name"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <ContactFormInput :disabled="loading" :item="form.email"/>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <ContactFormInput :disabled="loading" :item="form.phone"/>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <ContactFormInput :disabled="loading" :item="form.subject"/>
                </div>
                <div class="col-sm-12 mb-3">
                    <ContactFormTextarea :disabled="loading" :item="form.message"/>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-end">
                        <button class="btn btn-primary" type="submit" :disabled="loading">
                            <span class="spinner-border spinner-border-sm" role="status" v-show="loading"></span>
                            <span v-show="!loading">Submit</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div v-else>
            <div class="toast show align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive"
                 aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        Your message has been sent, Thank you!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" @click="show = true" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import ContactFormInput from "./ContactFormInput";
import ContactFormTextarea from "./ContactFormTextarea";

export default {
    components: {
        ContactFormInput,
        ContactFormTextarea
    },
    methods: {
        resetErrors() {
            this.form.first_name.errors = null
            this.form.last_name.errors = null
            this.form.email.errors = null
            this.form.phone.errors = null
            this.form.subject.errors = null
            this.form.message.errors = null
        },
        resetForm() {
            this.form.first_name.value = null
            this.form.last_name.value = null
            this.form.email.value = null
            this.form.phone.value = null
            this.form.subject.value = null
            this.form.message.value = null
        },
        submit(e) {
            e.preventDefault();
            this.resetErrors();
            let data = {
                first_name: this.form.first_name.value,
                last_name: this.form.last_name.value,
                email: this.form.email.value,
                phone: this.form.phone.value,
                subject: this.form.subject.value,
                message: this.form.message.value
            }
            this.loading = true;

            axios.post('/api/contacts', data)
                .then(() => {
                    this.show = false
                    this.resetForm();
                })
                .catch(errors => {
                    for (const key in errors.response.data.errors) {
                        this.form[key].errors = errors.response.data.errors[key]
                    }
                })
                .finally(() => {
                    this.loading = false
                })
        }
    },
    data() {
        return {
            show: true,
            loading: false,
            form: {
                first_name: {
                    id: 'first_name',
                    label: 'First name',
                    type: 'text',
                    value: null,
                    errors: null
                },
                last_name: {
                    id: 'last_name',
                    label: 'Last name',
                    type: 'text',
                    value: null,
                    errors: null
                },
                email: {
                    id: 'email',
                    label: 'Email',
                    type: 'email',
                    value: null,
                    errors: null
                },
                phone: {
                    id: 'phone',
                    label: 'Phone',
                    type: 'text',
                    description: 'Optional',
                    value: null,
                    errors: null
                },
                subject: {
                    id: 'subject',
                    label: 'Subject',
                    type: 'text',
                    value: null,
                    errors: null
                },
                message: {
                    id: 'message',
                    label: 'Message',
                    description: 'Max. 500 characters',
                    value: null,
                    errors: null
                },
            }
        }
    }
}
</script>
<style>
@media (max-width: 768px) {
    form button[type="submit"] {
        width: 100%;
    }
}
</style>
