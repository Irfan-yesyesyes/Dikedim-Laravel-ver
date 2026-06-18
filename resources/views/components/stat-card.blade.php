<div class="card stat-card bg-{{ $color ?? 'primary' }} text-white">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="card-title text-uppercase text-opacity-75">{{ $title }}</h6>
                <h2 class="card-text mb-0 fw-bold">{{ $value }}</h2>
            </div>
            <div class="stat-icon">
                <i class="{{ $icon ?? 'bi bi-info-circle' }} fa-3x" style="opacity: 0.3;"></i>
            </div>
        </div>
    </div>
</div>

<style>
    .stat-card {
        border-radius: 0.5rem;
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        min-height: 140px;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .stat-icon {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
