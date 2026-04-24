// Filter và Sort JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const filterBtn = document.getElementById('filter-toggle');
    const sortBtn = document.getElementById('sort-toggle');
    const filterDropdown = document.getElementById('filter-dropdown');
    const sortDropdown = document.getElementById('sort-dropdown');
    const gridViewBtn = document.getElementById('grid-view');
    const listViewBtn = document.getElementById('list-view');
    const productsGrid = document.getElementById('all-products');
    
    // Toggle Filter Dropdown
    filterBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        filterDropdown.classList.toggle('show');
        sortDropdown.classList.remove('show');
    });
    
    // Toggle Sort Dropdown
    sortBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        sortDropdown.classList.toggle('show');
        filterDropdown.classList.remove('show');
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        filterDropdown.classList.remove('show');
        sortDropdown.classList.remove('show');
    });
    
    // Prevent dropdown from closing when clicking inside
    filterDropdown.addEventListener('click', function(e) {
        e.stopPropagation();
    });
    
    sortDropdown.addEventListener('click', function(e) {
        e.stopPropagation();
    });
    
    // View Toggle
    gridViewBtn.addEventListener('click', function() {
        gridViewBtn.classList.add('active');
        listViewBtn.classList.remove('active');
        productsGrid.classList.remove('list-view');
    });
    
    listViewBtn.addEventListener('click', function() {
        listViewBtn.classList.add('active');
        gridViewBtn.classList.remove('active');
        productsGrid.classList.add('list-view');
    });
    
    // Sort Options
    const sortOptions = document.querySelectorAll('.sort-option');
    sortOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove active from all options
            sortOptions.forEach(opt => opt.classList.remove('active'));
            // Add active to clicked option
            this.classList.add('active');
            
            // Get sort type
            const sortType = this.getAttribute('data-sort');
            sortProducts(sortType);
            
            // Close dropdown
            sortDropdown.classList.remove('show');
        });
    });
    
    // Filter by checkboxes
    const filterCheckboxes = document.querySelectorAll('.filter-options input[type="checkbox"]');
    filterCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            filterProducts();
        });
    });
});

// Toggle Filter Group (Accordion)
function toggleFilterGroup(header) {
    const content = header.nextElementSibling;
    const icon = header.querySelector('i');
    
    if (!content || !icon) {
        console.error('Filter group elements not found');
        return;
    }
    
    // Close all other filter groups first (accordion behavior)
    const allHeaders = document.querySelectorAll('.filter-group-header');
    const allContents = document.querySelectorAll('.filter-group-content');
    
    allHeaders.forEach(h => {
        if (h !== header) {
            h.classList.remove('active');
            const otherIcon = h.querySelector('i');
            if (otherIcon) {
                otherIcon.style.transform = 'rotate(0deg)';
            }
        }
    });
    
    allContents.forEach(c => {
        if (c !== content) {
            c.classList.remove('show');
        }
    });
    
    // Toggle current filter group
    const isActive = header.classList.contains('active');
    
    if (isActive) {
        // Close current group
        header.classList.remove('active');
        content.classList.remove('show');
        icon.style.transform = 'rotate(0deg)';
    } else {
        // Open current group
        header.classList.add('active');
        content.classList.add('show');
        icon.style.transform = 'rotate(45deg)';
    }
}

// Make sure function is available globally
window.toggleFilterGroup = toggleFilterGroup;

// Sort Products Function
function sortProducts(sortType) {
    const productsGrid = document.getElementById('all-products');
    const products = Array.from(productsGrid.children);
    
    products.sort((a, b) => {
        switch(sortType) {
            case 'price-asc':
                return parseInt(a.getAttribute('data-price')) - parseInt(b.getAttribute('data-price'));
            case 'price-desc':
                return parseInt(b.getAttribute('data-price')) - parseInt(a.getAttribute('data-price'));
            case 'name':
                return a.querySelector('.product-name').textContent.localeCompare(b.querySelector('.product-name').textContent);
            case 'newest':
                // Assuming newer products have higher IDs
                return parseInt(b.getAttribute('data-id') || 0) - parseInt(a.getAttribute('data-id') || 0);
            default:
                return 0;
        }
    });
    
    // Re-append sorted products
    products.forEach(product => {
        productsGrid.appendChild(product);
    });
}

// Filter Products Function - Cập nhật để xử lý nhiều loại filter
function filterProducts() {
    console.log('filterProducts() called');
    
    const checkedFilters = document.querySelectorAll('.filter-options input[type="checkbox"]:checked');
    const products = document.querySelectorAll('.product-card');
    
    console.log('Checked filters:', checkedFilters.length);
    console.log('Products found:', products.length);
    
    // Nếu không có filter nào được chọn, hiển thị tất cả
    if (checkedFilters.length === 0) {
        console.log('No filters checked, showing all products');
        products.forEach(product => {
            product.style.display = 'block';
        });
        return;
    }
    
    // Tạo object chứa các filter được chọn
    const activeFilters = {
        categories: [],
        prices: [],
        styles: [],
        materials: [],
        shapes: [],
        colors: [],
        ringStyles: [],
        ringTypes: [],
        stoneTypes: [],
        collections: [],
        productTypes: [],
        sizes: []
    };
    
    checkedFilters.forEach(filter => {
        const value = filter.value;
        const parent = filter.closest('.filter-group');
        const sectionTitle = parent.querySelector('.filter-group-header span').textContent.trim();
        
        console.log('Filter:', sectionTitle, '=', value);
        
        switch(sectionTitle) {
            case 'DANH MỤC':
                activeFilters.categories.push(value);
                break;
            case 'THEO GIÁ':
            case 'KHOẢNG GIÁ':
                activeFilters.prices.push(value);
                break;
            case 'KIỂU DÁNG NHẪN':
                activeFilters.ringStyles.push(value);
                break;
            case 'LOẠI NHẪN':
                activeFilters.ringTypes.push(value);
                break;
            case 'PHONG CÁCH':
                activeFilters.styles.push(value);
                break;
            case 'CHẤT LIỆU':
                activeFilters.materials.push(value);
                break;
            case 'KIỂU VIỀN CHỦ':
            case 'DẠNG KIM CƯƠNG':
                activeFilters.shapes.push(value);
                break;
            case 'MÀU SẮC':
                activeFilters.colors.push(value);
                break;
            case 'ĐÁ TÂM':
                activeFilters.stoneTypes.push(value);
                break;
            case 'BỘ SƯU TẬP':
                activeFilters.collections.push(value);
                break;
            case 'TRANG SỨC KIM CƯƠNG':
                activeFilters.productTypes.push(value);
                break;
            case 'LOẠI TRANG SỨC':
                activeFilters.productTypes.push(value);
                break;
            case 'KÍCH THƯỚC':
                activeFilters.sizes.push(value);
                break;
        }
    });
    
    console.log('Active filters:', activeFilters);
    
    // Filter sản phẩm
    let visibleCount = 0;
    products.forEach(product => {
        let shouldShow = true;
        
        const productCategory = product.getAttribute('data-category');
        const productPrice = parseInt(product.getAttribute('data-price'));
        const productStyle = product.getAttribute('data-style') || '';
        const productRingStyle = product.getAttribute('data-ring-style') || '';
        const productMaterial = product.getAttribute('data-material') || '';
        const productColor = product.getAttribute('data-color') || '';
        const productBorderType = product.getAttribute('data-border-type') || '';
        const productStoneType = product.getAttribute('data-stone-type') || '';
        const productCollection = product.getAttribute('data-collection') || '';
        
        // Debug first product
        if (products[0] === product) {
            console.log('First product data:', {
                category: productCategory,
                price: productPrice,
                style: productStyle,
                ringStyle: productRingStyle,
                material: productMaterial,
                color: productColor,
                borderType: productBorderType,
                stoneType: productStoneType,
                collection: productCollection
            });
        }
        
        // Filter theo danh mục
        if (activeFilters.categories.length > 0) {
            shouldShow = shouldShow && activeFilters.categories.includes(productCategory);
        }
        
        // Filter theo giá
        if (activeFilters.prices.length > 0) {
            let priceMatch = false;
            activeFilters.prices.forEach(priceRange => {
                const [min, max] = priceRange.split('-').map(p => parseInt(p));
                if (productPrice >= min && productPrice <= max) {
                    priceMatch = true;
                }
            });
            shouldShow = shouldShow && priceMatch;
        }
        
        // Filter theo kiểu dáng nhẫn
        if (activeFilters.ringStyles.length > 0) {
            shouldShow = shouldShow && activeFilters.ringStyles.includes(productRingStyle);
        }
        
        // Filter theo loại nhẫn
        if (activeFilters.ringTypes.length > 0) {
            const productRingType = product.getAttribute('data-ring-type') || '';
            shouldShow = shouldShow && activeFilters.ringTypes.includes(productRingType);
        }
        
        // Filter theo phong cách
        if (activeFilters.styles.length > 0) {
            shouldShow = shouldShow && activeFilters.styles.includes(productStyle);
        }
        
        // Filter theo chất liệu
        if (activeFilters.materials.length > 0) {
            shouldShow = shouldShow && activeFilters.materials.includes(productMaterial);
        }
        
        // Filter theo màu sắc
        if (activeFilters.colors.length > 0) {
            shouldShow = shouldShow && activeFilters.colors.includes(productColor);
        }
        
        // Filter theo kiểu viền chủ
        if (activeFilters.shapes.length > 0) {
            shouldShow = shouldShow && activeFilters.shapes.includes(productBorderType);
        }
        
        // Filter theo đá tâm
        if (activeFilters.stoneTypes.length > 0) {
            shouldShow = shouldShow && activeFilters.stoneTypes.includes(productStoneType);
        }
        
        // Filter theo bộ sưu tập
        if (activeFilters.collections.length > 0) {
            shouldShow = shouldShow && activeFilters.collections.includes(productCollection);
        }

        // Filter theo loại trang sức (product_type)
        if (activeFilters.productTypes.length > 0) {
            const productType = product.getAttribute('data-product-type') || '';
            shouldShow = shouldShow && activeFilters.productTypes.includes(productType);
        }

        // Filter theo kích thước kim cương
        if (activeFilters.sizes.length > 0) {
            const productSize = product.getAttribute('data-size') || '';
            shouldShow = shouldShow && activeFilters.sizes.includes(productSize);
        }
        
        // Hiển thị hoặc ẩn sản phẩm
        product.style.display = shouldShow ? 'block' : 'none';
        if (shouldShow) visibleCount++;
    });
    
    console.log('Visible products:', visibleCount);
}

// Đảm bảo tất cả sản phẩm hiển thị khi trang load
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, ensuring all products are visible');
    const products = document.querySelectorAll('.product-card');
    console.log('Found', products.length, 'products on page load');
    
    products.forEach(product => {
        product.style.display = 'block';
    });
});