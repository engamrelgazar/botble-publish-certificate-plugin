document.addEventListener('DOMContentLoaded', function () {
    if (typeof fsLightboxInstances !== 'undefined') {
        fsLightboxInstances['certificate-gallery'].props.loadOnlyCurrentSource = true;
    }
});