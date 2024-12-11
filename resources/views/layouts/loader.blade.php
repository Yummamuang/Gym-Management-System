<div id="circle" class="fixed z-50"></div>
<script>
    const loader_circle = document.getElementById('circle')
    const height = window.innerHeight
    const width = window.innerWidth
    const body = document.body

    loader_circle.style.height = `${(height + width) * 1.5}px`;
    loader_circle.style.width = `${(height + width) * 1.5}px`;
    body.style.overflow = 'hidden'

    window.addEventListener('load', () => {
        setTimeout(() => {
            loader_circle.style.transform = 'translateY(-100%)'
            body.style.overflowY = 'auto'
        }, 600);

        setTimeout(() => {
            loader_circle.style.height = '0px'
            loader_circle.style.width = '0px'
        }, 1200);

        setTimeout(() => {
            loader_circle.style.display = 'none'
        }, 2000);
    })
</script>
