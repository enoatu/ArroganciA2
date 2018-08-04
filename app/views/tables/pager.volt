<nav id="pager">
    <ul class="pagination">
         <li>
            <a href="{{ url(toLocalorGlobal ~ '/index/' ~ kind ~ '?search=' ~ postedWordsPlus) }}" aria-label="最初のページへ">
                <span aria-hidden="true">最初へ</span>
            </a>
        </li>
        <li>
            <a href="{{ url(toLocalorGlobal ~ '/index/' ~ kind ~ '?page=' ~ page.before ~ '&search=' ~  postedWordsPlus )}}" aria-label="前のページへ">
                <span aria-hidden="true">前へ</span>
            </a>
        </li>
        <li class="disabled"><a href="#">{{ page.current ~ ' / ' ~ page.total_pages }}</a></li>
        <li>
            <a href="{{ url(toLocalorGlobal ~ '/index/' ~ kind ~ '?page=' ~ page.next ~ '&search=' ~ postedWordsPlus )}}" aria-label="次のページへ">
                <span aria-hidden="true">次へ</span>
            </a>
        </li>
        <li>
            <a href="{{ url(toLocalorGlobal ~ '/index/' ~ kind ~ '?page=' ~ page.last ~ '&search=' ~ postedWordsPlus )}}" aria-label="最後のページへ">
                <span aria-hidden="true">最後へ</span>
            </a>
        </li>
    </ul>
</nav>


