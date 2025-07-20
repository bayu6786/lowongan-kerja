<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Job Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-title {
            text-align: center;
            margin-bottom: 40px;
            color: #2d3748;
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .form-group {
            position: relative;
            margin-bottom: 30px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a5568;
            font-size: 0.95rem;
            position: relative;
            padding-left: 20px;
        }

        .form-label::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 12px;
            height: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
        }

        .form-control {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.9);
            color: #2d3748;
            position: relative;
            z-index: 1;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 1);
        }

        .form-control:hover {
            border-color: #cbd5e0;
            transform: translateY(-1px);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            pointer-events: none;
            transition: color 0.3s ease;
        }

        .form-group:focus-within .input-icon {
            color: #667eea;
        }

        .floating-label {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            pointer-events: none;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            padding: 0 8px;
            border-radius: 4px;
        }

        .form-control:focus + .floating-label,
        .form-control:not(:placeholder-shown) + .floating-label {
            top: 0;
            font-size: 0.8rem;
            color: #667eea;
            font-weight: 600;
        }

        .form-group::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-radius: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }

        .form-group:focus-within::before {
            opacity: 1;
        }

        .special-field {
            position: relative;
            overflow: hidden;
        }

        .special-field::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }

        .special-field:hover::after {
            left: 100%;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            animation: fadeInUp 0.6s ease forwards;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        .form-group:nth-child(6) { animation-delay: 0.6s; }
        .form-group:nth-child(7) { animation-delay: 0.7s; }
        .form-group:nth-child(8) { animation-delay: 0.8s; }
        .form-group:nth-child(9) { animation-delay: 0.9s; }

        .form-section {
            position: relative;
            margin-bottom: 40px;
        }

        .section-divider {
            height: 2px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 1px;
            margin: 30px 0;
            position: relative;
            overflow: hidden;
        }

        .section-divider::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
                margin: 10px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .form-title {
                font-size: 2rem;
            }
        }

        .input-wrapper {
            position: relative;
        }

        .input-prefix {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-weight: 600;
            z-index: 2;
        }

        .form-control.with-prefix {
            padding-left: 50px;
        }

        .required-asterisk {
            color: #e53e3e;
            font-weight: bold;
            margin-left: 4px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Job Information Form</h2>
        
        <div class="form-section">
            <div class="form-row">
                <div class="form-group special-field">
                    <label class="form-label">Nama Perusahaan<span class="required-asterisk">*</span></label>
                    <div class="input-wrapper">
                        <input type="text" name="company_name" value="{{ old('company_name', $job->company_name ?? '') }}" class="form-control" placeholder=" ">
                        <div class="input-icon">🏢</div>
                    </div>
                </div>

                <div class="form-group special-field">
                    <label class="form-label">Posisi<span class="required-asterisk">*</span></label>
                    <div class="input-wrapper">
                        <input type="text" name="position" value="{{ old('position', $job->position ?? '') }}" class="form-control" placeholder=" ">
                        <div class="input-icon">💼</div>
                    </div>
                </div>
            </div>

            <div class="section-divider"></div>

            <div class="form-row">
                <div class="form-group special-field">
                    <label class="form-label">Lokasi<span class="required-asterisk">*</span></label>
                    <div class="input-wrapper">
                        <input type="text" name="location" value="{{ old('location', $job->location ?? '') }}" class="form-control" placeholder=" ">
                        <div class="input-icon">📍</div>
                    </div>
                </div>

                <div class="form-group special-field">
                    <label class="form-label">Jenis Pekerjaan</label>
                    <div class="input-wrapper">
                        <input type="text" name="job_type" value="{{ old('job_type', $job->job_type ?? '') }}" class="form-control" placeholder=" ">
                        <div class="input-icon">⚡</div>
                    </div>
                </div>
            </div>

            <div class="section-divider"></div>

            <div class="form-group full-width special-field">
                <label class="form-label">Deskripsi Pekerjaan<span class="required-asterisk">*</span></label>
                <div class="input-wrapper">
                    <textarea name="job_description" class="form-control" placeholder="Deskripsikan detail pekerjaan, tanggung jawab, dan lingkungan kerja...">{{ old('job_description', $job->job_description ?? '') }}</textarea>
                    <div class="input-icon">📝</div>
                </div>
            </div>

            <div class="form-group full-width special-field">
                <label class="form-label">Kualifikasi<span class="required-asterisk">*</span></label>
                <div class="input-wrapper">
                    <textarea name="qualification" class="form-control" placeholder="Tuliskan kualifikasi yang diperlukan, pengalaman, dan keahlian...">{{ old('qualification', $job->qualification ?? '') }}</textarea>
                    <div class="input-icon">🎓</div>
                </div>
            </div>

            <div class="section-divider"></div>

            <div class="form-row">
                <div class="form-group special-field">
                    <label class="form-label">Tanggal Kadaluarsa</label>
                    <div class="input-wrapper">
                        <input type="date" name="expiration_date" value="{{ old('expiration_date', isset($job->expiration_date) ? \Carbon\Carbon::parse($job->expiration_date)->format('Y-m-d') : '') }}" class="form-control">
                        <div class="input-icon">📅</div>
                    </div>
                </div>

                <div class="form-group special-field">
                    <label class="form-label">Gaji</label>
                    <div class="input-wrapper">
                        <div class="input-prefix">Rp</div>
                        <input type="text" name="salary" value="{{ old('salary', $job->salary ?? '') }}" class="form-control with-prefix" placeholder="0">
                        <div class="input-icon">💰</div>
                    </div>
                </div>
            </div>

            <div class="form-group full-width special-field">
                <label class="form-label">Kontak</label>
                <div class="input-wrapper">
                    <input type="text" name="contact" value="{{ old('contact', $job->contact ?? '') }}" class="form-control" placeholder="Email atau nomor telepon untuk kontak">
                    <div class="input-icon">📞</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-control');
            
            inputs.forEach(input => {
                // Add focus and blur effects
                input.addEventListener('focus', function() {
                    this.parentElement.parentElement.style.transform = 'scale(1.02)';
                    this.parentElement.parentElement.style.transition = 'transform 0.3s ease';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.parentElement.style.transform = 'scale(1)';
                });

                // Add typing animation
                input.addEventListener('input', function() {
                    const icon = this.parentElement.querySelector('.input-icon');
                    if (icon) {
                        icon.style.transform = 'translateY(-50%) scale(1.2)';
                        icon.style.transition = 'transform 0.2s ease';
                        setTimeout(() => {
                            icon.style.transform = 'translateY(-50%) scale(1)';
                        }, 200);
                    }
                });
            });

            // Add floating animation to form groups
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach((group, index) => {
                group.style.opacity = '0';
                group.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    group.style.opacity = '1';
                    group.style.transform = 'translateY(0)';
                    group.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                }, index * 100);
            });

            // Format salary input
            const salaryInput = document.querySelector('input[name="salary"]');
            if (salaryInput) {
                salaryInput.addEventListener('input', function() {
                    let value = this.value.replace(/[^\d]/g, '');
                    if (value) {
                        value = parseInt(value).toLocaleString('id-ID');
                        this.value = value;
                    }
                });
            }
        });
    </script>
</body>
</html>