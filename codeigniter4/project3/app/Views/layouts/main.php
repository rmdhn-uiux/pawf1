<?php helper('auth') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'MyBlog' ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: rgba(99, 102, 241, 0.1);
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --success: #10b981;
            --success-light: rgba(16, 185, 129, 0.1);
            --warning: #f59e0b;
            --warning-light: rgba(245, 158, 11, 0.1);
            --danger: #ef4444;
            --danger-light: rgba(239, 68, 68, 0.1);
            --dark: #111827;
            --gray: #6b7280;
            --gray-light: #f3f4f6;
            --border-radius: 1rem;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: #f3f4f6;
            background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
            font-family: 'Inter', sans-serif;
            color: #1f2937;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            background: var(--primary-gradient);
            color: white;
            padding: 120px 0;
            margin-bottom: 4rem;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -10%;
            width: 40%;
            height: 100%;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
            transform: rotate(-15deg);
        }
        .hero-section-sm {
            padding: 80px 0;
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            opacity: 0.9;
            transform: scale(1.02);
            box-shadow: var(--shadow-lg);
        }
        .btn-outline-primary {
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        .btn-outline-primary:hover {
            background: var(--primary-gradient);
            border-color: transparent;
            color: white;
        }
        .btn-soft-primary {
            background: var(--primary-light);
            color: var(--primary);
            border: none;
        }
        .btn-soft-primary:hover {
            background: var(--primary);
            color: white;
        }

        /* ===== CARDS ===== */
        .card-custom {
            border: none;
            border-radius: var(--border-radius);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: white;
            overflow: hidden;
        }
        .card-custom:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-xl) !important;
        }
        .card-custom-sm:hover {
            transform: translateY(-3px);
        }

        /* ===== BADGES ===== */
        .badge-category {
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 50rem;
            padding: 0.35rem 0.85rem;
            font-weight: 700;
            font-size: 0.75rem;
        }
        .badge-published {
            background: var(--success-light);
            color: var(--success);
            border-radius: 50rem;
            padding: 0.35rem 0.85rem;
            font-weight: 700;
        }
        .badge-draft {
            background: var(--warning-light);
            color: var(--warning);
            border-radius: 50rem;
            padding: 0.35rem 0.85rem;
            font-weight: 700;
        }

        /* ===== ALERTS ===== */
        .alert-flash {
            border: none;
            border-radius: var(--border-radius);
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .alert-flash-success {
            background: var(--success-light);
            color: #065f46;
        }
        .alert-flash-error {
            background: var(--danger-light);
            color: #991b1b;
        }
        .alert-flash i {
            font-size: 1.25rem;
        }

        /* ===== FORMS ===== */
        .form-custom {
            background: var(--gray-light);
            border: none;
            padding: 0.75rem 1.25rem;
            border-radius: 0.75rem;
            transition: all 0.2s;
        }
        .form-custom:focus {
            background: white;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        /* ===== ADMIN TABLE ===== */
        .admin-table {
            border-radius: var(--border-radius);
            overflow: hidden;
        }
        .admin-table thead th {
            background: var(--gray-light);
            text-transform: uppercase;
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--gray);
            padding: 1rem 0.75rem;
            letter-spacing: 0.05em;
            border-bottom: none;
        }
        .admin-table tbody tr {
            transition: all 0.2s;
        }
        .admin-table tbody tr:hover {
            background: rgba(99, 102, 241, 0.03);
        }
        .admin-table tbody td {
            padding: 1rem 0.75rem;
            vertical-align: middle;
        }
        .admin-table .dropdown-menu {
            border: none;
            border-radius: 0.75rem;
            box-shadow: var(--shadow-xl);
        }

        /* ===== SECTION HEADERS ===== */
        .section-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            gap: 1rem;
        }
        .section-header h2 {
            font-size: 1.5rem;
            margin-bottom: 0.25rem;
        }
        .section-header p {
            color: var(--gray);
            margin-bottom: 0;
            font-size: 0.9rem;
        }

        /* ===== STAT CARDS ===== */
        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            border-left: 4px solid var(--primary);
        }

        /* ===== FOOTER ===== */
        .footer {
            background-color: var(--dark);
            color: #9ca3af;
            padding: 4rem 0;
            margin-top: 5rem;
        }

        /* ===== MISC ===== */
        .hover-primary:hover {
            color: var(--primary) !important;
        }
        .tracking-wider {
            letter-spacing: 0.1em;
        }
        .z-1 { z-index: 1; }
        .z-2 { z-index: 2; }
        .mt-n5 { margin-top: -5rem !important; }
        .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255,255,255,0.5);
        }
    </style>
</head>

<body>

    <?= $this->include('layouts/navbar'); ?>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; <?= date('Y') ?> MyBlog. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>
