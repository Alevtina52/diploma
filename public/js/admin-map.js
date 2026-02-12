document.addEventListener("DOMContentLoaded", function () {

    const districts = document.querySelectorAll('.district');
    const modal = document.getElementById('districtModal');
    const closeBtn = document.getElementById('closeModal');

    const districtName = document.getElementById('districtName');
    const addFireBtn = document.getElementById('addFireBtn');
    const listFireBtn = document.getElementById('listFireBtn');

    districts.forEach(district => {

        district.addEventListener('click', function () {

            const slug = this.id;
            const name = this.dataset.name;

            districtName.textContent = name;

            addFireBtn.href = `${baseUrl}/fires/create?slug=${slug}`;
            listFireBtn.href = `${baseUrl}/fires?slug=${slug}`;

            modal.style.display = 'block';
        });

    });


    closeBtn.addEventListener('click', function () {
        modal.style.display = 'none';
    });

});
