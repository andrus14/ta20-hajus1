const locationCell = document.getElementById('location');
const descriptionCell = document.getElementById('description');
const iconCell = document.getElementById('icon');

fetch('https://api.openweathermap.org/data/2.5/weather?lat=58.2&lon=22.5&appid=3331cbd11994fc7b1580a74f92248913&units=metric')
.then(response => response.json())
.then(data => {
    console.log(data);
    locationCell.innerText = data.name;
    descriptionCell.innerText = data.weather[0].main;

    const iconImg = document.createElement('img');
    iconImg.src = `https://openweathermap.org/img/wn/${data.weather[0].icon}.png`;
    iconCell.append(iconImg);
});
