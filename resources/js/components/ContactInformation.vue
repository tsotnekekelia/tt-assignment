<template>
    <div class="vh-100" id="contact-info">
        <h5>Contact Information</h5>
        <ul class="list-group mb-5">
            <li class="list-group-item"><i class="bi-telephone"></i> +1 123-456-789</li>
            <li class="list-group-item"><i class="bi-envelope"></i> message@contact.us</li>
        </ul>
        <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
            <a href="https://facebook.com" target="_blank" class="me-5 link-light"><i class="bi-facebook"></i></a>
            <a href="https://github.com" target="_blank" class="me-5 link-light"><i class="bi-github"></i></a>
            <a href="https://twitter.com" target="_blank" class="link-light"><i class="bi-twitter"></i></a>
        </div>
    </div>
</template>

<script>
export default {}
</script>
<style>
@media (max-width: 768px) {
    #contact-info {
        height: auto !important;
    }
}
#contact-info {
    color: #ffffff;
}
#contact-info i {
    font-size: 2rem;
}
#contact-info .list-group-item {
    background: no-repeat;
    border: none;
    color: #ffffff;
    padding-left: 0;
}
#contact-info .list-group-item i {
    font-size: 1.4rem;
    margin-right: 1rem;
}
</style>
