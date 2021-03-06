<?php foreach($attributes->onlyProps(['team', 'component' => 'jet-dropdown-link']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['team', 'component' => 'jet-dropdown-link']); ?>
<?php foreach (array_filter((['team', 'component' => 'jet-dropdown-link']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $component] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#','onclick' => 'event.preventDefault();
                                                 document.getElementById(\'switch-team-form-'.e($team->id).'\').submit();']); ?>
    <div class="d-flex align-content-center">
        <?php if(Auth::user()->isCurrentTeam($team)): ?>
            <svg class="me-1 text-success" width="20" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <?php endif; ?>

        <div class="text-truncate" style="width: 12rem;"><?php echo e($team->name); ?></div>
    </div>

    <form method="POST" action="<?php echo e(route('current-team.update')); ?>" id="switch-team-form-<?php echo e($team->id); ?>">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>

        <!-- Hidden Team ID -->
        <input type="hidden" name="team_id" value="<?php echo e($team->id); ?>">
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>


<?php /**PATH C:\wamp64\www\consultorio\resources\views/vendor/jetstream/components/switchable-team.blade.php ENDPATH**/ ?>