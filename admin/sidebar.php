<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <!-- search form -->
            <form action="results.php" method="post" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search by member no" required="">
                    <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                    </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
        </li>
        <li>
            <a href="admins.php"><i class="fa fa-fw fa-user"></i> System Admins</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#member"><i class="fa fa-fw fa-group"></i> Members <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="member" class="collapse">
                <li>
                    <a href="index.php?option=Add_Member"><i class="fa fa-angle-double-right"></i> Add New Member</a>
                </li>
                <li>
                    <a href="members.php"><i class="fa fa-angle-double-right"></i> View All Members</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#contributions"><i class="fa fa-fw fa-money"></i> Member Contributions <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="contributions" class="collapse">
                <li>
                    <a href="index.php?option=Member_No"><i class="fa fa-angle-double-right"></i> Add New Entry</a>
                </li>
                <li>
                    <a href="contributions.php"><i class="fa fa-angle-double-right"></i> All Contributions</a>
                </li>
                <li>
                    <a href="contribution_types.php"><i class="fa fa-angle-double-right"></i> Contribution Types</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#group"><i class="fa fa-fw fa-tag"></i> Groups <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="group" class="collapse">
                <li>
                    <a href="index.php?option=Add_Group"><i class="fa fa-angle-double-right"></i> Add New Group</a>
                </li>
                <li>
                    <a href="groups.php"><i class="fa fa-angle-double-right"></i> List Groups</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#family"><i class="fa fa-fw fa-group"></i> Families <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="family" class="collapse">
                <li>
                    <a href="index.php?option=Add_Family"><i class="fa fa-angle-double-right"></i> Add New Family</a>
                </li>
                <li>
                    <a href="families.php"><i class="fa fa-angle-double-right"></i> List Families</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="stations.php"><i class="fa fa-fw fa-group"></i> Stations</a>
        </li>
        <li>
            <a href="sunday_sch.php"><i class="fa fa-fw fa-child"></i> Sunday School</a>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#events"><i class="fa fa-fw fa-calendar"></i> Events <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="events" class="collapse">
                <li>
                    <a href="events.php"><i class="fa fa-angle-double-right"></i> All Events</a>
                </li>
                <li>
                    <a href="manage_events.php"><i class="fa fa-angle-double-right"></i> Manage Events</a>
                </li>
            </ul>
        </li>
    </ul>
</div>