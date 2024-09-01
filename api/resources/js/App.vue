<template>
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">

        <div class="max-w-lg w-full bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold mb-6 text-gray-800">Contact Form</h1>

            <Form @submit="handleSubmit">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                    <Field type="text" name="name" :rules="validateName"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <ErrorMessage class="error-message text-red-600 text-sm mt-1" name="name" />
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <Field type="email" name="email" :rules="validateEmail"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <ErrorMessage class="error-message text-red-600 text-sm mt-1" name="email" />
                </div>

                <div class="mb-4">
                    <label for="subject" class="block text-gray-700 text-sm font-medium mb-2">Subject</label>
                    <Field type="text" name="subject" :rules="validateSubject"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <ErrorMessage class="error-message text-red-600 text-sm mt-1" name="subject" />
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-gray-700 text-sm font-medium mb-2">Message</label>
                    <Field as="textarea" name="message" :rules="validateMessage"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <ErrorMessage class="error-message text-red-600 text-sm mt-1" name="message" />
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Send
                    Message</button>
            </Form>
        </div>

    </div>
</template>

<script>
import { Form, Field, ErrorMessage } from 'vee-validate';
import axios from 'axios'
const baseApiURL = import.meta.env.VITE_BASE_API_URL
export default {
    name: 'App',
    components: {
        Form,
        Field,
        ErrorMessage,
    },
    methods: {
        handleSubmit(values) {
            axios.post(baseApiURL + '/contact', values).then(response => {
                console.log("🚀 ~ axios.post ~ response:", response)
            }).catch(error => {
                if (error.response.status === 422) {
                    error.response.data.errors
                }
            })
        },
        validateName(value) {
            // if the field is empty
            if (!value) {
                return 'This field is required';
            }
            if (value.length > 100) {
                return 'Max length is 100 characters'
            }
            return true;
        }, validateEmail(value) {
            // if the field is empty
            if (!value) {
                return 'This field is required';
            }
            if (value.length > 100) {
                return 'Max length is 100 characters'
            }
            // if the field is not a valid email
            const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            if (!regex.test(value)) {
                return 'This field must be a valid email';
            }
            // All is good
            return true;
        }, validateSubject(value) {
            // if the field is empty
            if (!value) {
                return 'This field is required';
            }
            if (value.length > 255) {
                return 'Max length is 100 characters'
            }
            // All is good
            return true;
        }, validateMessage(value) {
            // if the field is empty
            if (!value) {
                return 'This field is required';
            }
            if (value.length > 1000) {
                return 'Max length is 100 characters'
            }
            return true;
        },
    }
};
</script>