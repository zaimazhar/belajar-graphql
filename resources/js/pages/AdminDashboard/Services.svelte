<script module lang="ts">
    import { services } from "@/routes";

    export const layout = {
        breadcrumbs: [
            {
                title: "Services",
                href: services(),
            },
        ],
    };
</script>

<script lang="ts">
    import AppHead from "@/components/AppHead.svelte";
    import PlaceholderPattern from "@/components/PlaceholderPattern.svelte";
    import Input from "@/components/ui/input/Input.svelte";
    import Label from "@/components/ui/label/Label.svelte";
    import Button from "@/components/ui/button/Button.svelte";
</script>

<AppHead title="Services" />

<div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
    <div
        class="relative min-h-screen flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border p-4"
    >
        <div>
            <Label for="search" class="mb-2 block text-sm font-medium">
                Field Type
            </Label>
            <Input id="search" type="text" />
        </div>
        <br />
        <div>
            <Label
                for="years-of-experience"
                class="mb-2 block text-sm font-medium"
            >
                Years of Experience
            </Label>
            <Input id="years-of-experience" type="number" />
        </div>
        <div>
            <Button
                type="submit"
                class="mt-4 w-full bg-primary text-primary-foreground hover:bg-primary/90 hover:text-primary-foreground/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 hover:cursor-pointer"
            >
                Submit
            </Button>
        </div>
    </div>
</div>
