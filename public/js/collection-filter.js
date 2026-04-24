// Collection Filter Data
const collectionData = {
    'kim-cuong': {
        image: 'https://cdn.pnj.io/images/promo/284/thong-tin-gia-vang.png',
        title: 'Trang Sức Kim Cương',
        descriptions: [
            '<strong>Mẫu Premium:</strong> Khi thành công hiện hữu qua những thành tựu kiệu hạnh, <strong>trang sức kim cương</strong> chính là lời xác nhận uy quyền cho vị thế của bạn. Mỗi giác cắt hoàn hảo ghi dấu một cột mốc thăng hoa, biến món trang sức thành "huan chương" dành giá tôn vinh bạn lĩnh của người đàn đầu. Đây là sự tượng trưng xứng tầm cho nỗi tại vàng chất và tầm vóc của những tâm hồn luôn thấu hiểu giá trị chính mình.',
            '<strong>Mẫu Entry:</strong> Khởi đầu chương mới bằng những tuyệt tác <strong>trang sức kim cương</strong> tinh giản và sắc sảo, sẵn sàng cùng bạn tỏa sáng mỗi ngày. Đây là món quà đầu tiên, là sự tượng trưng xứng tầm cho những nỗ lực không ngừng trên hành trình chính phục bản lĩnh. Mỗi thiết kế tiền đại không chỉ mang tính ứng dụng cao mà còn là cột mốc thăng hoa, tôn vinh khi chất của thế hệ dẫn đầu luôn thấu hiểu giá trị bản thân.'
        ]
    },
    'ngoc-trai': {
        image: 'https://via.placeholder.com/500x500/FFF5EE/666666?text=Ngoc+Trai',
        title: 'Trang Sức Ngọc Trai',
        descriptions: [
            '<strong>Vẻ đẹp tự nhiên:</strong> <strong>Trang sức ngọc trai</strong> mang đến vẻ đẹp thuần khiết và thanh lịch từ đại dương. Mỗi viên ngọc trai là một tác phẩm nghệ thuật của thiên nhiên, tỏa sáng với ánh sáng dịu dàng và quyến rũ.',
            '<strong>Phong cách cổ điển:</strong> Ngọc trai là biểu tượng của sự sang trọng vượt thời gian. Từ những sợi dây cổ cổ điển đến bông tai hiện đại, <strong>trang sức ngọc trai</strong> luôn là lựa chọn hoàn hảo cho mọi dịp đặc biệt, tôn vinh vẻ đẹp nữ tính và quyền lực.'
        ]
    },
    'ecz': {
        image: 'https://via.placeholder.com/500x500/E6E6FA/666666?text=ECZ',
        title: 'Trang Sức ECZ',
        descriptions: [
            '<strong>Công nghệ hiện đại:</strong> <strong>Trang sức ECZ</strong> (Enhanced Cubic Zirconia) kết hợp công nghệ tiên tiến với thiết kế tinh tế, mang đến vẻ đẹp lấp lánh không thua kém kim cương thiên nhiên.',
            '<strong>Giá trị tối ưu:</strong> Với độ bền cao và giá cả hợp lý, trang sức ECZ là lựa chọn thông minh cho những ai yêu thích vẻ đẹp sang trọng mà vẫn tiết kiệm. Mỗi viên đá ECZ được chế tác tỉ mỉ, phản chiếu ánh sáng hoàn hảo.'
        ]
    },
    'day-chuyen': {
        image: 'https://via.placeholder.com/500x500/FFD700/666666?text=Day+Chuyen',
        title: 'Trang Sức Dây Chuyền',
        descriptions: [
            '<strong>Điểm nhấn hoàn hảo:</strong> <strong>Dây chuyền</strong> là món trang sức không thể thiếu, tạo điểm nhấn cho vùng cổ và khuôn mặt. Từ thiết kế đơn giản đến phức tạp, mỗi sợi dây chuyền đều mang một câu chuyện riêng.',
            '<strong>Đa dạng phong cách:</strong> Bộ sưu tập dây chuyền của chúng tôi bao gồm nhiều chất liệu từ vàng, bạc đến platinum, phù hợp với mọi phong cách từ cổ điển đến hiện đại, từ công sở đến dạ tiệc.'
        ]
    },
    'cz': {
        image: 'https://via.placeholder.com/500x500/B0E0E6/666666?text=CZ',
        title: 'Trang Sức CZ',
        descriptions: [
            '<strong>Cubic Zirconia:</strong> <strong>Trang sức CZ</strong> là lựa chọn phổ biến với vẻ đẹp lấp lánh và giá cả phải chăng. Đá CZ có độ cứng cao, không bị xỉn màu theo thời gian.',
            '<strong>Thiết kế đa dạng:</strong> Từ nhẫn, bông tai đến vòng tay, trang sức CZ mang đến vô số lựa chọn cho mọi lứa tuổi và phong cách. Hoàn hảo cho việc sử dụng hàng ngày hoặc làm quà tặng ý nghĩa.'
        ]
    },
    'da-mau': {
        image: 'https://via.placeholder.com/500x500/FF69B4/666666?text=Da+Mau',
        title: 'Trang Sức Đá Màu',
        descriptions: [
            '<strong>Sắc màu rực rỡ:</strong> <strong>Trang sức đá màu</strong> mang đến sự tươi mới và cá tính với những viên đá quý như ruby, sapphire, emerald, topaz... Mỗi loại đá có ý nghĩa và năng lượng riêng.',
            '<strong>Phong thủy và may mắn:</strong> Đá màu không chỉ đẹp mà còn được tin là mang lại may mắn, sức khỏe và thịnh vượng. Lựa chọn đá màu phù hợp với mệnh và sở thích để tăng thêm năng lượng tích cực.'
        ]
    },
    'bac': {
        image: 'https://via.placeholder.com/500x500/C0C0C0/666666?text=Bac',
        title: 'Trang Sức Bạc',
        descriptions: [
            '<strong>Bạc 925 cao cấp:</strong> <strong>Trang sức bạc</strong> với độ tinh khiết 92.5% mang đến vẻ đẹp thanh lịch và hiện đại. Bạc có tính kháng khuẩn tự nhiên, an toàn cho làn da nhạy cảm.',
            '<strong>Phong cách trẻ trung:</strong> Với giá cả phải chăng và thiết kế đa dạng, trang sức bạc là lựa chọn yêu thích của giới trẻ. Dễ dàng phối hợp với nhiều trang phục, từ casual đến formal.'
        ]
    },
    'y': {
        image: 'https://via.placeholder.com/500x500/DAA520/666666?text=Y',
        title: 'Trang Sức Y',
        descriptions: [
            '<strong>Thiết kế độc đáo:</strong> <strong>Trang sức Y</strong> với kiểu dáng chữ Y đặc trưng, tạo điểm nhấn ấn tượng cho vùng cổ. Phù hợp với áo cổ V hoặc cổ tròn.',
            '<strong>Xu hướng thời trang:</strong> Dây chuyền Y đang là xu hướng được nhiều fashionista yêu thích. Kết hợp hoàn hảo giữa sự thanh lịch và hiện đại, tôn lên vẻ đẹp quyến rũ của người đeo.'
        ]
    },
    'vo': {
        image: 'https://via.placeholder.com/500x500/F5DEB3/666666?text=Vo',
        title: 'Trang Sức Vỏ',
        descriptions: [
            '<strong>Từ thiên nhiên:</strong> <strong>Trang sức vỏ</strong> được chế tác từ vỏ sò, ốc biển tự nhiên, mang đến vẻ đẹp mộc mạc và gần gũi với thiên nhiên. Mỗi món trang sức đều độc nhất vô nhị.',
            '<strong>Phong cách bohemian:</strong> Trang sức vỏ phù hợp với phong cách boho, beach style. Nhẹ nhàng, thoải mái, hoàn hảo cho mùa hè và những chuyến du lịch biển.'
        ]
    },
    'khong-gan-da': {
        image: 'https://via.placeholder.com/500x500/F0E68C/666666?text=Khong+Gan+Da',
        title: 'Trang Sức Không Gắn Đá',
        descriptions: [
            '<strong>Vẻ đẹp tối giản:</strong> <strong>Trang sức không gắn đá</strong> tôn vinh vẻ đẹp của chính kim loại quý. Thiết kế tối giản, tinh tế, phù hợp với phong cách minimalist hiện đại.',
            '<strong>Bền vững và lâu dài:</strong> Không có đá gắn kèm, trang sức này ít rủi ro hư hỏng, dễ bảo quản và sử dụng lâu dài. Phù hợp cho cả nam và nữ, mọi lứa tuổi và phong cách.'
        ]
    }
};

// Initialize filter buttons
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    filterButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Get collection key based on button text
            const buttonText = this.textContent.trim();
            let collectionKey = '';
            
            switch(buttonText) {
                case 'Trang Sức Kim Cương':
                    collectionKey = 'kim-cuong';
                    break;
                case 'Trang Sức Ngọc Trai':
                    collectionKey = 'ngoc-trai';
                    break;
                case 'Trang Sức ECZ':
                    collectionKey = 'ecz';
                    break;
                case 'Trang Sức Dây chuyền':
                    collectionKey = 'day-chuyen';
                    break;
                case 'Trang Sức CZ':
                    collectionKey = 'cz';
                    break;
                case 'Trang Sức Đá màu':
                    collectionKey = 'da-mau';
                    break;
                case 'Trang Sức Bạc':
                    collectionKey = 'bac';
                    break;
                case 'Trang Sức Y':
                    collectionKey = 'y';
                    break;
                case 'Trang Sức Vỏ':
                    collectionKey = 'vo';
                    break;
                case 'Trang Sức Không gắn đá':
                    collectionKey = 'khong-gan-da';
                    break;
            }
            
            // Update content
            if (collectionKey && collectionData[collectionKey]) {
                updateCollectionContent(collectionData[collectionKey]);
            }
        });
    });
});

// Update collection content
function updateCollectionContent(data) {
    // Update image
    const collectionImage = document.querySelector('.collection-image img');
    if (collectionImage) {
        collectionImage.src = data.image;
        collectionImage.alt = data.title;
    }
    
    // Update description
    const descriptionContainer = document.querySelector('.collection-description');
    if (descriptionContainer) {
        descriptionContainer.innerHTML = data.descriptions.map(desc => 
            `<p>${desc}</p>`
        ).join('');
    }
}
