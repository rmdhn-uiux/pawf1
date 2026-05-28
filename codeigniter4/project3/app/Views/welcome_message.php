<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 fw-bold">Welcome to CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h1>
        <p class="lead mb-4">The small framework with powerful features.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="https://codeigniter.com/user_guide/" target="_blank" class="btn btn-light btn-lg px-4 rounded-pill shadow-sm">User Guide</a>
            <a href="<?= base_url('post') ?>" class="btn btn-outline-light btn-lg px-4 rounded-pill">Explore Blog</a>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 p-4">
                <h4 class="fw-bold mb-3">About this page</h4>
                <p class="text-muted">The page you are looking at is being generated dynamically by CodeIgniter.</p>
                <p class="text-muted">If you would like to edit this page you will find it located at:</p>
                <code class="bg-light p-2 rounded d-block mb-3">app/Views/welcome_message.php</code>
                <p class="text-muted">The corresponding controller for this page can be found at:</p>
                <code class="bg-light p-2 rounded d-block">app/Controllers/Home.php</code>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 p-4">
                <h4 class="fw-bold mb-3">Go Further</h4>
                <div class="list-group list-group-flush">
                    <a href="https://forum.codeigniter.com/" target="_blank" class="list-group-item list-group-item-action border-0 px-0">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-bold">Community Forum</h6>
                        </div>
                        <p class="mb-1 text-muted small">Exchange ideas with other developers.</p>
                    </a>
                    <a href="https://join.slack.com/t/codeigniterchat/shared_invite/zt-rl30zw00-obL1Hr1q1ATvkzVkFp8S0Q" target="_blank" class="list-group-item list-group-item-action border-0 px-0">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-bold">Slack Chat</h6>
                        </div>
                        <p class="mb-1 text-muted small">Chat with the community in real-time.</p>
                    </a>
                    <a href="https://codeigniter.com/contribute" target="_blank" class="list-group-item list-group-item-action border-0 px-0">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-bold">Contribute</h6>
                        </div>
                        <p class="mb-1 text-muted small">Join us and help improve the framework.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
