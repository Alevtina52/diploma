document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('districtModal');
    const title = document.getElementById('districtTitle');
    const info = document.getElementById('districtInfo');
    const closeBtn = document.querySelector('#districtModal .close');

    if (!modal) {
        console.error('Модалка не найдена!');
        return;
    }

    const districts = document.querySelectorAll('.district');

    districts.forEach(function (district) {

        const slug = district.id;

        const data = (typeof districtData !== 'undefined' && districtData[slug])
            ? districtData[slug]
            : {
                name: slug,
                total: 0,
                area: 0,
                active: 0,
                closed: 0
            };

        /* ===== РАСКРАСКА ===== */
        const fires = parseInt(data.total);

        if (fires <= 5) {
            district.setAttribute('fill', '#A8E6A3');
        } else if (fires <= 15) {
            district.setAttribute('fill', '#FFD966');
        } else if (fires <= 30) {
            district.setAttribute('fill', '#FF9E4A');
        } else {
            district.setAttribute('fill', '#FF4A4A');
        }

        /* ===== КЛИК ===== */
        district.addEventListener('click', function () {

            title.textContent = data.name;

            info.innerHTML = `
                <p><strong>Всего пожаров:</strong> ${data.total}</p>
                <p><strong>Общая площадь (га):</strong> ${data.area}</p>
                <p><strong>Активных:</strong> ${data.active}</p>
                <p><strong>Ликвидировано:</strong> ${data.closed}</p>
            `;

            modal.style.display = 'block';
        });
    });

    // Раскрашиваем районы по количеству пожаров
    districts.forEach(district => {
        const fires = parseInt(district.dataset.fires || 0);

        if (fires <= 5) {
            district.classList.add('fires-low');
        } else if (fires <= 15) {
            district.classList.add('fires-medium');
        } else if (fires <= 30) {
            district.classList.add('fires-high');
        } else {
            district.classList.add('fires-critical');
        }
    });


    /* ===== ЗАКРЫТИЕ ===== */
    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });
    }

    window.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

});


