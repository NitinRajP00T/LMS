<!-- Lesson Resources Component -->
<div id="lesson-resources" class="space-y-stack-md">
    <!-- Resources Header -->
    <div class="flex items-center justify-between mb-stack-md">
        <h2 class="font-headline-md text-headline-md text-on-background">Course Resources</h2>
        @if(Auth::user()->role === 'instructor' && Auth::user()->id === $course->user_id)
            <button 
                type="button"
                onclick="toggleUploadForm()"
                class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg font-label-md hover:bg-primary-container transition-colors"
            >
                <span class="material-symbols-outlined" style="font-size: 18px;">add</span>
                Upload Resource
            </button>
        @endif
    </div>

    <!-- Upload Form (Hidden by default) -->
    @if(Auth::user()->role === 'instructor' && Auth::user()->id === $course->user_id)
    <div id="upload-form-container" class="bg-surface-container-low p-6 rounded-xl border border-outline-variant mb-stack-md" style="display: none;">
        <h3 class="font-label-lg text-on-background mb-4">Upload New Resource</h3>
        
        <form id="resource-upload-form" enctype="multipart/form-data">
            @csrf
            
            <div class="space-y-4">
                <!-- Title Input -->
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Resource Title</label>
                    <input 
                        type="text"
                        id="resource-title"
                        name="title"
                        placeholder="e.g., Lecture Slides, Code Repository, etc."
                        class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                        required
                    />
                </div>

                <!-- Resource Type Tabs -->
                <div class="flex gap-2 border-b border-outline-variant">
                    <button 
                        type="button"
                        class="resource-type-tab px-4 py-2 font-label-md text-primary border-b-2 border-primary active"
                        data-type="file"
                        onclick="switchResourceType('file', this)"
                    >
                        Upload File
                    </button>
                    <button 
                        type="button"
                        class="resource-type-tab px-4 py-2 font-label-md text-on-surface-variant hover:text-on-surface"
                        data-type="url"
                        onclick="switchResourceType('url', this)"
                    >
                        External Link
                    </button>
                </div>

                <!-- File Upload Section -->
                <div id="file-upload-section" class="space-y-2">
                    <label class="block font-label-md text-on-surface mb-2">Choose File</label>
                    <div class="border-2 border-dashed border-outline-variant rounded-lg p-6 text-center hover:border-primary transition-colors cursor-pointer" onclick="document.getElementById('resource-file').click()">
                        <div class="flex flex-col items-center gap-2">
                            <span class="material-symbols-outlined text-4xl text-on-surface-variant">cloud_upload</span>
                            <p class="text-body-md text-on-surface-variant">Drag and drop or click to select</p>
                            <p class="text-label-sm text-on-surface-variant">Max file size: 100MB</p>
                        </div>
                        <input 
                            type="file"
                            id="resource-file"
                            name="file"
                            class="hidden"
                            onchange="updateFileName()"
                        />
                    </div>
                    <p id="file-name" class="text-label-sm text-on-surface-variant"></p>
                </div>

                <!-- URL Input Section -->
                <div id="url-input-section" class="space-y-2" style="display: none;">
                    <label class="block font-label-md text-on-surface mb-2">Resource URL</label>
                    <input 
                        type="url"
                        id="resource-url"
                        name="url"
                        placeholder="https://example.com/resource"
                        class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    />
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-2 pt-4">
                    <button 
                        type="button"
                        class="px-6 py-2 border border-outline-variant rounded-lg font-label-md text-on-surface hover:bg-surface-container-low transition-colors"
                        onclick="toggleUploadForm()"
                    >
                        Cancel
                    </button>
                    <button 
                        type="button"
                        onclick="uploadResource()"
                        class="px-6 py-2 bg-primary text-white rounded-lg font-label-md hover:bg-primary-container transition-colors"
                    >
                        Upload
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endif

    <!-- Resources List -->
    <div id="resources-list" class="space-y-3">
        <!-- Resources will be loaded here -->
    </div>
</div>

<!-- Resource Item Template (hidden, used for cloning) -->
<template id="resource-template">
    <div class="flex items-start gap-4 p-4 bg-surface-container-low rounded-lg border border-outline-variant hover:border-primary transition-colors group">
        <div class="flex-shrink-0 pt-1">
            <span class="material-symbols-outlined text-primary text-2xl resource-icon">description</span>
        </div>
        
        <div class="flex-1 min-w-0">
            <h3 class="font-label-md text-on-surface resource-title break-words"></h3>
            <p class="text-label-sm text-on-surface-variant resource-meta"></p>
            <p class="text-body-sm text-on-surface-variant resource-description mt-1" style="display: none;"></p>
        </div>

        <div class="flex items-center gap-2 flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity">
            @if(Auth::user()->role === 'instructor' && Auth::user()->id === $course->user_id)
                <button 
                    class="p-2 hover:bg-surface-container-high rounded-lg transition-colors delete-resource-btn"
                    onclick="deleteResource(this)"
                    title="Delete"
                >
                    <span class="material-symbols-outlined text-error">delete</span>
                </button>
            @endif
            <button 
                class="p-2 hover:bg-surface-container-high rounded-lg transition-colors download-resource-btn"
                onclick="downloadResource(this)"
                title="Download"
            >
                <span class="material-symbols-outlined text-primary">download</span>
            </button>
        </div>
    </div>
</template>

<style>
    .resource-type-tab.active {
        border-bottom-color: var(--primary-color);
        color: var(--primary-color);
    }
</style>

<script>
    const LESSON_ID = {{ $lesson->id }};
    const COURSE_ID = {{ $course->id }};
    const AUTH_USER_ID = {{ Auth::id() }};
    const AUTH_USER_ROLE = "{{ Auth::user()->role }}";
    const IS_INSTRUCTOR = AUTH_USER_ROLE === 'instructor' && AUTH_USER_ID === {{ $course->user_id }};
    const RESOURCE_API_BASE = `/student/api/lessons/${LESSON_ID}`;

    // Load resources on page load
    document.addEventListener('DOMContentLoaded', function() {
        loadResources();
    });

    /**
     * Load all resources for the lesson
     */
    async function loadResources() {
        try {
            const response = await fetch(`${RESOURCE_API_BASE}/resources`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (!response.ok) throw new Error('Failed to load resources');

            const data = await response.json();
            
            if (data.success && data.data) {
                renderResources(data.data);
            }
        } catch (error) {
            console.error('Error loading resources:', error);
            showResourceError('Failed to load resources');
        }
    }

    /**
     * Render resources in the DOM
     */
    function renderResources(resources) {
        const resourcesList = document.getElementById('resources-list');
        resourcesList.innerHTML = '';

        if (resources.length === 0) {
            resourcesList.innerHTML = '<p class="text-center text-on-surface-variant font-body-md py-8">No resources available yet.</p>';
            return;
        }

        resources.forEach(resource => {
            const resourceEl = renderResource(resource);
            resourcesList.appendChild(resourceEl);
        });
    }

    /**
     * Render a single resource
     */
    function renderResource(resource) {
        const template = document.getElementById('resource-template');
        const clone = template.content.cloneNode(true);

        clone.querySelector('.resource-title').textContent = resource.title;
        
        // Determine icon and meta based on resource type
        if (resource.file_path) {
            const fileExt = resource.file_path.split('.').pop().toLowerCase();
            updateResourceIcon(clone, fileExt);
            clone.querySelector('.resource-meta').textContent = `File • ${formatDate(resource.created_at)}`;
        } else if (resource.url) {
            clone.querySelector('.resource-icon').textContent = 'link';
            clone.querySelector('.resource-meta').textContent = `Link • ${formatDate(resource.created_at)}`;
        }

        // Hide delete button if not instructor
        if (!IS_INSTRUCTOR) {
            const deleteBtn = clone.querySelector('.delete-resource-btn');
            if (deleteBtn) deleteBtn.style.display = 'none';
        }

        // Set data attributes for reference
        const wrapper = document.createElement('div');
        wrapper.appendChild(clone);
        const resourceDiv = wrapper.firstElementChild;
        resourceDiv.dataset.resourceId = resource.id;
        resourceDiv.dataset.resourcePath = resource.file_path || '';
        resourceDiv.dataset.resourceUrl = resource.url || '';

        return resourceDiv;
    }

    /**
     * Update resource icon based on file type
     */
    function updateResourceIcon(element, fileExt) {
        const iconMap = {
            'pdf': 'picture_as_pdf',
            'doc': 'description',
            'docx': 'description',
            'xls': 'table_chart',
            'xlsx': 'table_chart',
            'ppt': 'slideshow',
            'pptx': 'slideshow',
            'zip': 'folder_zip',
            'rar': 'folder_zip',
            'mp4': 'videocam',
            'avi': 'videocam',
            'txt': 'description',
            'csv': 'table_chart',
        };

        const icon = iconMap[fileExt] || 'description';
        element.querySelector('.resource-icon').textContent = icon;
    }

    /**
     * Toggle upload form visibility
     */
    function toggleUploadForm() {
        const form = document.getElementById('upload-form-container');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
        if (form.style.display === 'block') {
            document.getElementById('resource-title').focus();
        }
    }

    /**
     * Switch resource type between file and URL
     */
    function switchResourceType(type, button) {
        // Update tabs
        document.querySelectorAll('.resource-type-tab').forEach(tab => {
            tab.classList.remove('text-primary', 'border-b-2', 'border-primary');
            tab.classList.add('text-on-surface-variant');
        });
        button.classList.add('text-primary', 'border-b-2', 'border-primary');
        button.classList.remove('text-on-surface-variant');

        // Update sections
        document.getElementById('file-upload-section').style.display = type === 'file' ? 'block' : 'none';
        document.getElementById('url-input-section').style.display = type === 'url' ? 'block' : 'none';

        // Clear inputs
        document.getElementById('resource-file').value = '';
        document.getElementById('resource-url').value = '';
        updateFileName();
    }

    /**
     * Update file name display
     */
    function updateFileName() {
        const fileInput = document.getElementById('resource-file');
        const fileNameEl = document.getElementById('file-name');
        
        if (fileInput.files.length > 0) {
            fileNameEl.textContent = `Selected: ${fileInput.files[0].name} (${formatFileSize(fileInput.files[0].size)})`;
        } else {
            fileNameEl.textContent = '';
        }
    }

    /**
     * Upload a new resource
     */
    async function uploadResource() {
        const title = document.getElementById('resource-title').value.trim();
        const fileInput = document.getElementById('resource-file');
        const urlInput = document.getElementById('resource-url').value.trim();

        if (!title) {
            showResourceError('Please enter a resource title');
            return;
        }

        if (!fileInput.files.length && !urlInput) {
            showResourceError('Please select a file or enter a URL');
            return;
        }

        const formData = new FormData();
        formData.append('title', title);

        if (fileInput.files.length > 0) {
            formData.append('file', fileInput.files[0]);
        } else if (urlInput) {
            formData.append('url', urlInput);
        }

        const uploadBtn = event.target;
        uploadBtn.disabled = true;
        uploadBtn.textContent = 'Uploading...';

        try {
            const response = await fetch(`${RESOURCE_API_BASE}/resources`, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });

            if (!response.ok) {
                const data = await response.json();
                throw new Error(data.message || 'Failed to upload resource');
            }

            const data = await response.json();
            
            if (data.success) {
                document.getElementById('resource-upload-form').reset();
                updateFileName();
                toggleUploadForm();
                loadResources();
                showResourceSuccess('Resource uploaded successfully');
            }
        } catch (error) {
            console.error('Error uploading resource:', error);
            showResourceError(error.message || 'Failed to upload resource');
        } finally {
            uploadBtn.disabled = false;
            uploadBtn.textContent = 'Upload';
        }
    }

    /**
     * Download a resource
     */
    function downloadResource(button) {
        const resourceDiv = button.closest('[data-resource-id]');
        const resourcePath = resourceDiv.dataset.resourcePath;
        const resourceUrl = resourceDiv.dataset.resourceUrl;
        const title = resourceDiv.querySelector('.resource-title').textContent;

        if (resourceUrl) {
            // Open external link
            window.open(resourceUrl, '_blank');
        } else if (resourcePath) {
            // Download file
            const link = document.createElement('a');
            link.href = `/storage/${resourcePath}`;
            link.download = title || 'resource';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }

    /**
     * Delete a resource
     */
    async function deleteResource(button) {
        if (!confirm('Are you sure you want to delete this resource?')) {
            return;
        }

        const resourceDiv = button.closest('[data-resource-id]');
        const resourceId = resourceDiv.dataset.resourceId;

        button.disabled = true;

        try {
            const response = await fetch(`${RESOURCE_API_BASE}/resources/${resourceId}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (!response.ok) throw new Error('Failed to delete resource');

            const data = await response.json();
            
            if (data.success) {
                loadResources();
                showResourceSuccess('Resource deleted successfully');
            }
        } catch (error) {
            console.error('Error deleting resource:', error);
            showResourceError('Failed to delete resource');
            button.disabled = false;
        }
    }

    /**
     * Format file size
     */
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return Math.round((bytes / Math.pow(k, i)) * 100) / 100 + ' ' + sizes[i];
    }

    /**
     * Format date to readable format
     */
    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
    }

    /**
     * Show success message
     */
    function showResourceSuccess(message) {
        console.log('Success:', message);
        alert(message);
    }

    /**
     * Show error message
     */
    function showResourceError(message) {
        console.error('Error:', message);
        alert('Error: ' + message);
    }
</script>
