import jsQR from "jsqr";
import axios from "axios";

let button = document.getElementById('qr-reader');
button.addEventListener('click', qrRead);

let dataBox = document.getElementById('data-box');
let eventName = document.getElementById('event-name');
let eventDate = document.getElementById('event-date');
let eventTime = document.getElementById('event-time');
let eventLocation = document.getElementById('event-location');
let eventDescription = document.getElementById('event-description');
let eventId = document.getElementById('event-id');
let entryId = document.getElementById('entry-id');
let csrfToken = document.getElementById('csrf-token').value;
let userId = document.getElementById('user-id').value;

function qrRead() {
    let video = document.createElement('video');
    let canvas = document.getElementById('canvas');
    let ctx = canvas.getContext('2d');
    let msg = document.getElementById('msg');

    button.classList.add('hidden');
    canvas.classList.remove('hidden');
    msg.classList.remove('hidden');

    const userMedia = {video: { facingMode: "environment" }};
    navigator.mediaDevices.getUserMedia(userMedia).then((stream) => {
        video.srcObject = stream;
        video.setAttribute('playsinline', true);
        video.play();
        video.addEventListener('canplay', startTick, false);
    });

    function startTick() {
        msg.innerHTML = '読み取り中...';
        if (video.readyState === video.HAVE_ENOUGH_DATA) {
            canvas.height = video.videoHeight;
            canvas.width = video.videoWidth;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            let imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            let code = jsQR(imageData.data, imageData.width, imageData.height, {
                inversionAttempts: "dontInvert",
            });
            if (code) {
                // msg.innerHTML = code.data;
                let data = JSON.parse(code.data);
                console.log(data);
                video.pause();
                video.srcObject.getTracks().forEach(track => track.stop());
                drawRect(code.location);
                // msg.classList.add('hidden');
                canvas.classList.add('hidden');
                axios.post('/entry/admission/success', {
                    data: data,
                    user_id: userId,
                    _token: csrfToken
                })
                    .then((response) => {
                        console.log(response.data);
                        if (response.data.check) {
                            dataBox.classList.remove('hidden');
                            eventName.innerHTML = response.data.event.name;
                            eventDate.innerHTML = response.data.event.date;
                            eventTime.innerHTML = response.data.event.time;
                            eventLocation.innerHTML = response.data.event.location;
                            eventDescription.innerHTML = response.data.event.description;
                            eventId.value = response.data.event.id;
                            entryId.value = response.data.entry_id;
                        } else {
                            msg.innerHTML = '参加申し込みが見つかりませんでした。';
                            setTimeout(startTick, 10);
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            } else {
                msg.innerHTML = 'QRコードが見つかりませんでした。';
                setTimeout(startTick, 10);
            }
        }

        function drawRect(location) {
            drawLine(location.topLeftCorner, location.topRightCorner);
            drawLine(location.topRightCorner, location.bottomRightCorner);
            drawLine(location.bottomRightCorner, location.bottomLeftCorner);
            drawLine(location.bottomLeftCorner, location.topLeftCorner);
        }

        function drawLine(begin, end) {
            ctx.lineWidth = 4;
            ctx.strokeStyle = "#FF3B58";
            ctx.beginPath();
            ctx.moveTo(begin.x, begin.y);
            ctx.lineTo(end.x, end.y);
            ctx.stroke();
        }
    }
}
