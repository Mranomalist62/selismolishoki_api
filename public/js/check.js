document
    .getElementById("status-form")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form from refreshing page

        const noResi = document.getElementById("noResi").value;

        fetch(`/cek-resi/${noResi}`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    const statusResult =
                        document.getElementById("status-result");
                    const statusDetails =
                        document.getElementById("status-details");
                    const statusRiwayat =
                        document.getElementById("status-riwayat");

                    // Set Summary Fields
                    document.getElementById("current-status").innerText =
                        mapStatus(data.data.status);
                    document.getElementById("nama-lengkap").innerText =
                        data.data.namaLengkap;
                    document.getElementById("nomor-telp").innerText =
                        data.data.noTelp;

                    // Generate Table Rows for History
                    let riwayatHtml = "";
                    data.data.riwayat.forEach((item) => {
                        const date = new Date(
                            item.created_at
                        ).toLocaleDateString("id-ID");
                        const time = new Date(
                            item.created_at
                        ).toLocaleTimeString("id-ID", {
                            hour: "2-digit",
                            minute: "2-digit",
                            hour12: false, // 24-hour format
                        });
                        const status = mapStatus(item.status);

                        riwayatHtml += `
                        <tr>
                            <td class="p-2">${date}</td>
                            <td class="p-2">${time}</td>
                            <td class="p-2">${status}</td>
                        </tr>
                    `;
                    });

                    statusRiwayat.innerHTML = riwayatHtml;
                    statusResult.classList.remove("hidden");
                } else {
                    alert(data.message);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });

function mapStatus(status) {
    const statusMapping = {
        pending: "Menunggu Konfirmasi",
        confirmed: "Sudah Konfirmasi",
        process: "Proses Perbaikan",
        completed: "Selesai",
        cancelled: "Dibatalkan",
    };
    return statusMapping[status] || status;
}

// Toggle Accordion
document
    .querySelector(".toggle-button")
    .addEventListener("click", function (event) {
        const statusDetails = document.getElementById("status-details");
        const chevron = document.getElementById("chevron");

        if (statusDetails.style.maxHeight) {
            statusDetails.style.maxHeight = null;
            chevron.style.transform = "rotate(0deg)";
        } else {
            statusDetails.style.maxHeight = statusDetails.scrollHeight + "px";
            chevron.style.transform = "rotate(180deg)";
        }
    });
