<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="h4 font-weight-bold">
            <?php echo e(__('Bienvenido')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    
    
    <div class="">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('index')->html();
} elseif ($_instance->childHasBeenRendered('RJKsYrc')) {
    $componentId = $_instance->getRenderedChildComponentId('RJKsYrc');
    $componentTag = $_instance->getRenderedChildComponentTagName('RJKsYrc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('RJKsYrc');
} else {
    $response = \Livewire\Livewire::mount('index');
    $html = $response->html();
    $_instance->logRenderedChild('RJKsYrc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div> 
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\consultorio\resources\views/dashboard.blade.php ENDPATH**/ ?>