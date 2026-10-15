# FD Studio — Android Applications Collection

Official home of premium modded Android applications developed and maintained by **Fahad Ahmad**.

* 🌐 **Live Website:** [https://fahadapps.github.io/fahadapps/](https://fahadapps.github.io/fahadapps/)
* 📦 **Official Releases:** [https://github.com/fahadapps/fahadapps/releases/tag/v1.0.0](https://github.com/fahadapps/fahadapps/releases/tag/v1.0.0)
* 📸 **Developer Instagram:** [@fahad57978](https://instagram.com/fahad57978)

---

## 📱 Featured Applications & Verified Downloads

Every application is 100% ad-free, verified clean on VirusTotal (0/72 engines flagged), and compatible up to Android 16.

| Application | Version | Size | Features | App Details Page | Direct APK Download |
|---|---|---|---|---|---|
| **FD YouTube Pro** | v60 (21.26.364) | 223 MB | 100% Ad-Free, Background Audio, PiP, 4K 60fps HDR, SponsorBlock | [View Details](https://fahadapps.github.io/fahadapps/youtube.html) | [Download APK](https://github.com/fahadapps/fahadapps/releases/download/v1.0.0/FD_YouTube_v60.apk) |
| **FD InstaPro** | v15.80 | 179 MB | High-Res Media Downloader, Ghost Mode, View Story Anonymously, No Ads | [View Details](https://fahadapps.github.io/fahadapps/instapro.html) | [Download APK](https://github.com/fahadapps/fahadapps/releases/download/v1.0.0/FD_InstaPro_v15.80.apk) |
| **Truecaller FD Gold** | v26.21.6 | 125 MB | Lifetime Gold Unlocked, Caller ID, Spam Shield, Profile View Insights | [View Details](https://fahadapps.github.io/fahadapps/truecaller.html) | [Download APK](https://github.com/fahadapps/fahadapps/releases/download/v1.0.0/Truecaller_FD_Modded.apk) |
| **Cinema VIP** | v3.2.0 | 38 MB | 4K & 1080p Streaming, Subtitles in 30+ Languages, Smart TV Cast | [View Details](https://fahadapps.github.io/fahadapps/cinema.html) | [Download APK](https://github.com/fahadapps/fahadapps/releases/download/v1.0.0/Cinema_VIP_Patched.apk) |
| **microG Service** | v8.0.0.1 | 12 MB | Required core service for FD YouTube Pro Google Account authentication | [microG Notice](https://fahadapps.github.io/fahadapps/download-youtube.html) | [Download microG](https://github.com/fahadapps/fahadapps/releases/download/v1.0.0/MicroG_8.0.0.1.apk) |

---

## 🛠️ Complete Process (Kaise Banaya aur Deploy Kiya Gaya)

Yeh project shuru me Desktop par PHP format me tha. Isko GitHub par 100% live aur fully functional banane ke liye nimnlikhit complete process execute kiya gaya:

### 1. Website Analysis & Limits Solution
* **Problem 1 (PHP Limitation):** GitHub Pages sirf static HTML/CSS/JavaScript execute karta hai, PHP script run nahi karta.
* **Problem 2 (100 MB Limit):** GitHub repository me 100 MB se badi files (`FD_YouTube` 223MB, `FD_InstaPro` 179MB, `Truecaller` 125MB) ko normal `git push` reject kar deta hai.
* **Architecture Solution:** 
  * Frontend website ko clean static HTML/CSS/JS me convert karke **GitHub Pages** par deploy kiya gaya (24/7 Free Uptime + SSL HTTPS).
  * Badi APK files ko **GitHub Releases** (`v1.0.0`) par upload kiya gaya (jahan 2 GB per file allowed hai).
  * Sabhi download buttons aur 5-second automatic countdown timers ko GitHub Release ke CDN direct download links se jod diya gaya.

### 2. Static Site Generation (GitHub Pages Ready)
* `index.html`: Main landing page jisme hero dock, 3D app cards, installation guide, aur accessible FAQs shamil hain.
* App Pages (`youtube.html`, `instapro.html`, `truecaller.html`, `cinema.html`): Har app ka individual specifications, changelog, aur feature showcase.
* Download Pages (`download-youtube.html`, `download-instapro.html`, etc.): 5-second automatic animated countdown timer aur fallback direct download buttons.
* `download.html`: Query router jo `download.html?app=youtube` jaise dynamic parameters ko handle karta hai.
* `.nojekyll`: Root me `.nojekyll` file create ki gayi taaki GitHub Pages bina kisi Jekyll issue ke sabhi assets load kare.
* `assets/`: Styling (`studio-3d.css`, `style.css`), logos, aur interactive controls (`main.js`).

### 3. Source Backup (`php_source/`)
Original dynamic PHP source files (`index.php`, `config.php`, `download.php`, `api.php`, `start_server.sh`) ko `php_source/` folder me safely store kiya gaya hai taaki agar bhavishya me ise kisi Apache, Nginx ya CyberPanel server par run karna ho toh direct use kiya ja sake.

### 4. Release Creation & Automated Binary Uploads
1. Git tag `v1.0.0` create karke GitHub remote par push kiya gaya.
2. Official Release create ki gayi: `FD Studio v1.0.0 Official Release`.
3. Sabhi 5 APK packages ko GitHub Releases API aur streaming tools ke zariye direct cloud storage me upload kiya gaya.

---

## 💻 Local Testing & Future Updates

### Local Server Run Kaise Karein:
Agar aap apne computer par website run karke dekhna chahte hain:

```bash
# Static Version (HTML)
cd ~/Desktop/Github
python3 -m http.server 8080
# Open http://localhost:8080 in your browser

# Dynamic PHP Version
cd ~/Desktop/Github/php_source
./start_server.sh
# Open http://localhost:8080
```

### Naya Version / Nayi APK Kaise Update Karein:
1. Nayi APK ko GitHub Releases me upload karein:
   * [https://github.com/fahadapps/fahadapps/releases/new](https://github.com/fahadapps/fahadapps/releases/new)
2. Website ke HTML pages me download link ko naye version ke URL se update karein.
3. Commit aur Push karein:
   ```bash
   cd ~/Desktop/Github
   git add .
   git commit -m "Update application version"
   git push origin main
   ```
4. GitHub Pages agle 30 seconds me live update ho jayega.

---

## 📜 License & Credits
Developed & maintained with ❤️ by **Fahad Ahmad**. All rights reserved.
