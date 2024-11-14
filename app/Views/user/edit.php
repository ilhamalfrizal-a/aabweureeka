<?= $this->extend("layout/backend") ?>

<?= $this->section("content") ?>

<section class="section">
    <div class="section-header">
        <a href="<?= site_url('user') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali </a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit User</h4>
            </div>
            <div class="card-body">
            <form method="post" action="<?= site_url('user/update/' . $user->userid) ?>"> <!-- Pastikan ini mengarah ke 'update' -->
             <?= csrf_field() ?>
    

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?= esc($user->username) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= esc($user->email) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= esc($role->id) ?>" <?= ($role->id == $user->role_id) ? 'selected' : '' ?>>
                                    <?= esc($role->name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update Role</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
