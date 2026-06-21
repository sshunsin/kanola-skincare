<x-app-layout>
    <style>
        .logo-set,
        .title-set h1,
        .section-title-set {
            font-family: 'Playfair Display', serif;
        }

        :root {
            --primary: #ec4899;
            --primary-light: #f9a8d4;
            --soft-pink: #fce7f3;
            --cream: #fff7ed;
            --white: #ffffff;
            --text: #444444;
            --gray: #888888;
            --border: #f8dce7;
            --shadow: 0 10px 30px rgba(236, 72, 153, 0.08);
        }

        .save-btn-set,
        .submit-set {
            padding: 14px 30px;
            border: none;
            border-radius: 15px;
            background: var(--primary);
            color: white;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            transition: 0.3s;
        }

        .save-btn-set:hover,
        .submit-set:hover {
            background: #db2777;
        }

        .cancel-set {
            padding: 14px 25px;
            background: white;
            color: #666;
            border: 1px solid var(--border);
            border-radius: 14px;
            cursor: pointer;
            transition: 0.3s;
        }

        .cancel-set:hover {
            background: #fafafa;
        }

        .grid-set {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card-set {
            padding: 25px;
            background: var(--white);
            border: 1px solid #fff3f6;
            border-radius: 25px;
            box-shadow: var(--shadow);
            transition: 0.3s;
        }

        .card-set:hover {
            transform: translateY(-5px);
        }

        .card-set h3 {
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #333;
        }

        .card-set label {
            display: block;
            margin-top: 15px;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
        }

        .card-set input,
        .card-set textarea,
        .card-set select {
            width: 100%;
            padding: 14px;
            border: 1px solid var(--border);
            border-radius: 14px;
            outline: none;
            font-size: 14px;
            background: white;
            transition: 0.3s;
        }

        .card-set textarea {
            height: 110px;
            resize: none;
        }

        .card-set input:focus,
        .card-set textarea:focus,
        .card-set select:focus {
            border-color: var(--primary);
        }

        .toggle-set {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 18px 0;
        }

        .toggle-set input {
            width: 20px;
            height: 20px;
            accent-color: var(--primary);
        }

        .toggle-set span {
            font-size: 15px;
        }

        .button-group-set {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 25px;
        }

        .profile-upload-set {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 25px;
        }

        .profile-upload-set img {
            width: 140px;
            height: 140px;
            margin-bottom: 20px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fce7f3;
            box-shadow: 0 10px 25px rgba(236, 72, 153, 0.1);
        }

        .upload-btn-set {
            padding: 12px 20px;
            background: #ec4899;
            color: #ffffff;
            border-radius: 12px;
            border: none;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .upload-btn-set:hover {
            background: #db2777;
        }

        .modal-set {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(236, 72, 153, 0.15);
            backdrop-filter: blur(8px);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal-content-set {
            background: rgba(255,255,255,0.95);
            padding: 28px;
            border-radius: 24px;
            width: 360px;
            box-shadow: 0 20px 50px rgba(236,72,153,0.15);
            position: relative;
        }

        .modal-content-set h2 {
            font-family: 'Playfair Display', serif;
            color: #ec4899;
        }

        .modal-body-set {
            margin-top: 10px;
            color: #444;
        }

        .close-set {
            position: absolute;
            right: 15px;
            top: 10px;
            cursor: pointer;
            font-size: 20px;
        }

        @media (max-width: 1200px) {
            .grid-set {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .button-group-set {
                flex-direction: column;
            }
            .cancel-set,
            .submit-set {
                width: 100%;
            }
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(session('status') === 'settings-updated')
                <div style="background-color: #dcfce7; color: #15803d; padding: 15px; border-radius: 12px; font-weight: 500;">
                    Settings saved successfully!
                </div>
            @endif

            <form method="post" action="{{ route('backend.v1.settings.preferences.update') }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="grid-set">
                    <div class="card-set">
                        <h3>Admin Profile</h3>

                        <div class="profile-upload-set">
                            <img id="profilePreview" src="{{ auth()->user()->profile_photo_path ? asset('storage/'.auth()->user()->profile_photo_path) : 'https://placehold.co/150x150/fce7f3/ec4899?text=Admin' }}" alt="Profile">
                            <label for="profileImage" class="upload-btn-set">
                                <i class="fa-solid fa-camera"></i> Change Photo
                            </label>
                            <input type="file" id="profileImage" name="profile_photo" accept="image/*" hidden>
                        </div>

                        <label for="adminName">Full Name</label>
                        <input type="text" id="adminName" name="name" value="{{ old('name', auth()->user()->name) }}" required>

                        <label for="adminEmail">Email</label>
                        <input type="email" id="adminEmail" name="email" value="{{ old('email', auth()->user()->email) }}" required>

                        <label for="adminPhone">Phone</label>
                        <input type="text" id="adminPhone" name="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}">
                    </div>

                    <div class="card-set">
                        <h3>Store Information</h3>

                        <label for="storeName">Store Name</label>
                        <input type="text" id="storeName" name="store_name" value="{{ old('store_name', $settings['store_name'] ?? '') }}">

                        <label for="storeEmail">Email</label>
                        <input type="email" id="storeEmail" name="store_email" value="{{ old('store_email', $settings['store_email'] ?? '') }}">

                        <label for="storePhone">Phone</label>
                        <input type="text" id="storePhone" name="store_phone" value="{{ old('store_phone', $settings['store_phone'] ?? '') }}">

                        <label for="storeAddress">Address</label>
                        <textarea id="storeAddress" name="store_address">{{ old('store_address', $settings['store_address'] ?? '') }}</textarea>
                    </div>
                </div>

                <div class="grid-set">
                    <div class="card-set">
                        <h3>Security</h3>

                        <label for="currentPassword">Current Password</label>
                        <input type="password" id="currentPassword" name="current_password">
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

                        <label for="newPassword">New Password</label>
                        <input type="password" id="newPassword" name="password">
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="password_confirmation">
                    </div>

                    <div class="card-set">
                        <h3>Preferensi & Notifikasi</h3>

                        <label for="theme">Tema Aplikasi</label>
                        <select id="theme" name="theme">
                            <option value="light" {{ (old('theme', $settings['theme'] ?? 'light') === 'light') ? 'selected' : '' }}>Terang</option>
                            <option value="dark" {{ (old('theme', $settings['theme'] ?? 'light') === 'dark') ? 'selected' : '' }}>Gelap</option>
                        </select>

                        <div class="toggle-set">
                            <input type="hidden" name="email_notifications" value="0">
                            <input id="notifications" name="email_notifications" type="checkbox" value="1" {{ old('email_notifications', $settings['email_notifications'] ?? '0') == '1' ? 'checked' : '' }}>
                            <span>Aktifkan Notifikasi Email</span>
                        </div>

                        <div class="toggle-set">
                            <input type="hidden" name="notify_new_orders" value="0">
                            <input id="newOrders" name="notify_new_orders" type="checkbox" value="1" {{ old('notify_new_orders', $settings['notify_new_orders'] ?? '1') == '1' ? 'checked' : '' }}>
                            <span>New Orders</span>
                        </div>

                        <div class="toggle-set">
                            <input type="hidden" name="notify_customer_reg" value="0">
                            <input id="customerReg" name="notify_customer_reg" type="checkbox" value="1" {{ old('notify_customer_reg', $settings['notify_customer_reg'] ?? '1') == '1' ? 'checked' : '' }}>
                            <span>Customer Registration</span>
                        </div>

                        <div class="toggle-set">
                            <input type="hidden" name="notify_product_review" value="0">
                            <input id="productReview" name="notify_product_review" type="checkbox" value="1" {{ old('notify_product_review', $settings['notify_product_review'] ?? '0') == '1' ? 'checked' : '' }}>
                            <span>Product Review</span>
                        </div>
                    </div>
                </div>

                <div class="grid-set">
                    <div class="card-set">
                        <h3>Payment Settings</h3>

                        <label for="bankName">Bank Name</label>
                        <input type="text" id="bankName" name="bank_name" value="{{ old('bank_name', $settings['bank_name'] ?? '') }}">

                        <label for="accountNumber">Account Number</label>
                        <input type="text" id="accountNumber" name="account_number" value="{{ old('account_number', $settings['account_number'] ?? '') }}">

                        <label for="accountHolder">Account Holder</label>
                        <input type="text" id="accountHolder" name="account_holder" value="{{ old('account_holder', $settings['account_holder'] ?? '') }}">
                    </div>

                    <div class="card-set">
                        <h3>Social Media</h3>

                        <label for="instagram">Instagram</label>
                        <input type="text" id="instagram" name="social_instagram" value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}">

                        <label for="tiktok">TikTok</label>
                        <input type="text" id="tiktok" name="social_tiktok" value="{{ old('social_tiktok', $settings['social_tiktok'] ?? '') }}">

                        <label for="facebook">Facebook</label>
                        <input type="text" id="facebook" name="social_facebook" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}">

                        <label for="website">Website</label>
                        <input type="text" id="website" name="social_website" value="{{ old('social_website', $settings['social_website'] ?? '') }}">
                    </div>
                </div>

                <div class="button-group-set">
                    <button type="button" class="cancel-set" id="cancelBtn">Cancel</button>
                    <button type="submit" class="submit-set">Save Settings</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cancelBtn = document.getElementById("cancelBtn");
            const passwords = document.querySelectorAll('input[type="password"]');
            const inputs = document.querySelectorAll(".card-set input, .card-set textarea, .card-set select");
            const imageInput = document.getElementById("profileImage");
            const preview = document.getElementById("profilePreview");

            cancelBtn?.addEventListener("click", () => {
                if (confirm("Discard all changes?")) {
                    location.reload();
                }
            });

            passwords.forEach(input => {
                input.addEventListener("dblclick", () => {
                    input.type = input.type === "password" ? "text" : "password";
                });
            });

            inputs.forEach(input => {
                input.addEventListener("focus", () => {
                    input.style.boxShadow = "0 0 10px rgba(236,72,153,.2)";
                });
                input.addEventListener("blur", () => {
                    input.style.boxShadow = "none";
                });
            });

            document.querySelectorAll('input[type="email"]').forEach(email => {
                email.addEventListener("blur", () => {
                    if (email.value && !email.value.includes("@")) {
                        alert("Please enter a valid email.");
                    }
                });
            });

            document.querySelectorAll('#adminPhone, #storePhone, #accountNumber').forEach(input => {
                input.addEventListener("input", () => {
                    input.value = input.value.replace(/[^0-9+]/g, "");
                });
            });

            if (imageInput && preview) {
                imageInput.addEventListener("change", function () {
                    const file = this.files?.[0];
                    if (!file) return;

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
</x-app-layout>