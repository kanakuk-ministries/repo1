<?php
  $args = array ();
?>

<div class="search-dropdown-position-container">
  <div id="search-dropdown" class="kamp-search-dropdown-container" v-cloak>
    <div class="search-dropdown-tabs-container show-for-small-only">
      <div class="search-dropdown-tab" v-bind:class="{ 'active': options.indexOf(selected_type) === index }" v-for="(option, index) in options" v-on:click="selectKampType(option)">
        <p class="margin-bottom-0">
          {{ option }}
        </p>
      </div>
    </div>
    <div class="kamp-search-dropdown-trigger-container">
      <!-- <div class="type-dropdown-trigger-container" @click="closeOtherDropdown()">
        <label class="card-label-text">Kamps for</label>
        <ul class="dropdown menu kamp-type-dropdown-menu" @click="closeOtherDropdown()" data-dropdown-menu data-disable-hover="true" data-click-open="true" data-close-on-click="true" data-close-on-click-inside="true" data-v-offset="5" data-position="bottom" data-alignment="left">
          <li class="full-width">
            <a class="flex-container justify-space-between" href="#" v-bind:class="{ 'dark-blue': selected_type !== '' }">{{ selected_type !== '' ? selected_type : 'Select' }}</a>
            <ul class="menu kamp-type-dropdown-options-container">
              <li class="kamp-type-dropdown-option-item" v-for="option in options" v-on:click="selectKampType(option)">
                <a href="#">{{ option }}</a>
              </li>
            </ul>
          </li>
        </ul>
      </div> -->
      <div class="type-dropdown-trigger-container">
        <label class="card-label-text">Kamp Type</label>
          <div data-toggle="kamp-type-dropdown" class="type-dropdown-text-container">
            <p class="bold margin-bottom-0 margin-top-5" v-bind:class="{ 'basic-gray': selected_type === '' || !selected_type, 'dark-blue': selected_type !== '' }">
              <span>{{ selected_type || 'Select' }}</span>
            </p>
            <i class="icon icon-caret-large-down primary"></i>
          </div>
      </div>
      <div class="kampers-dropdown-trigger-container" v-bind:class="{ 'disabled': selected_type === '' }">
        <label class="card-label-text">Kampers</label>
        <div data-toggle="kampers-dropdown" class="kampers-dropdown-text-container">
          <p class="basic-gray bold margin-bottom-0 margin-top-5">

            <span v-if="checkForSelections()">Select</span>

            <span class="primary" v-else-if="selected_type === 'Children'" v-for="(child, index) in children_kamp.added_children.selections">
              
              <span v-if="child.first_name">{{ child.first_name }}</span>
              <span v-else>Child {{ index + 1 }}</span>
              <span v-if="index !== children_kamp.added_children.selections.length - 1">, </span>
              
            </span>

            <span class="primary" v-else-if="selected_type === 'Families'">
              <span v-if="family_kamp.added_adults.selections.length > 0">{{ family_kamp.added_adults.selections.length }} Adult<span v-if="family_kamp.added_adults.selections.length > 1">s</span>
              <span v-if="family_kamp.added_children_young.selections.length + family_kamp.added_children_old.selections.length > 0 || family_kamp.added_infants.selections.length">, </span>
              </span>
              
              <span v-if="family_kamp.added_children_young.selections.length || family_kamp.added_children_old.selections.length">
                {{ family_kamp.added_children_young.selections.length + family_kamp.added_children_old.selections.length }}
                <span v-if="family_kamp.added_children_young.selections.length + family_kamp.added_children_old.selections.length === 1"> Child</span>
                <span v-if="family_kamp.added_children_young.selections.length + family_kamp.added_children_old.selections.length > 1"> Children</span>
                <span v-if="family_kamp.added_infants.selections.length">, </span>
              </span>
              
              <span v-if="family_kamp.added_infants.selections.length">{{ family_kamp.added_infants.selections.length }} Infant<span v-if="family_kamp.added_infants.selections.length > 1">s</span>
              </span>
            </span>
          </p>
          <i class="icon icon-caret-large-down primary"></i>
        </div>
      </div>
    </div>

    <div  class="dropdown-pane kamp-type-dropdown-container" 
          id="kamp-type-dropdown" 
          data-dropdown 
          data-close-on-click="true"
          data-close-on-click-inside="true"
          data-v-offset="25" 
          data-h-offset="-20" 
          data-position="bottom" 
          data-alignment="left">
          <ul class="kamp-type-dropdown-options-container">
            <li class="kamp-type-dropdown-option-item" v-for="option in options" v-on:click="selectKampType(option)">
              <a class="dark-gray">{{ option }}</a>
            </li>
          </ul>
    </div>

    <div  class="dropdown-pane kampers-dropdown-container" 
          id="kampers-dropdown" 
          data-dropdown 
          data-close-on-click="true"
          data-close-on-click-inside="true"
          data-v-offset="20" 
          data-position="bottom" 
          data-alignment="left">
      <div class="flex-container flex-column">
        <div class="kampers-children-selection-container" v-for="value in selected_kamp">
          <div class="kampers-children-count-container" v-bind:class="{ 'align-flex-start': user }">

          <p v-if="!user" class="dark-gray margin-bottom-0">{{ value.selection_prefix }}</p>
            <div v-else>
              <p class="bold kampers-selection-label margin-bottom-0">My Kampers (click kamper to select)</p>
              <div class="flex-container">
                <div v-for="kamper in user.kampers" class="kampers-dropdown-existing-avatar">
                  <div @click="selectKamper(value, kamper)" class="flex-container flex-column align-center justify-center">
                    <div class="avatar small" v-bind:style="{ 'background-image': 'url(' + kamper.child_photo_url + ')' }"></div>
                    <p class="margin-bottom-0 margin-top-10">{{ kamper.first_name }}</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex-container flex-column">
              <p class="bold kampers-selection-label margin-bottom-0" v-if="user">New Kampers</p>
              <div class="kampers-children-count-counter">
                <i @click="removeKamper(value)" class="icon icon-field-minus primary large" v-bind:class="{ 'disabled': !value.selections.length }"></i>
                <p class="bold margin-bottom-0">{{ value.selections.length }}</p>
                <i @click="addKamper(value)" class="icon icon-field-plus primary large"></i>
              </div>
              
            </div>

          </div>

          <hr class="hr-light hr-thin" v-if="!checkForSelections()" />

          <div class="kampers-children-grid-container">
            <div class="kampers-children-added-child" v-for="(kamper, index) in value.selections" v-if="!kamper.first_name">
              <p class="margin-bottom-10 dark-blue bold"><span v-if="user">New </span>{{ value.selection_prefix }} {{ index + 1 }}</p>
              <div class="flex-container align-center full-width">
                <label class="small-input-container flex-container align-center full-width justify-space-between">
                  <span class="card-text-label margin-right-10">Age</span>
                  <input class="kampers-children-age-input margin-bottom-5 margin-top-0" type="number" :min="value.min_age || ''" :max="value.max_age || ''" v-model="kamper.age">
                </label>
              </div>
              <div class="flex-container align-center full-width" v-if="selected_type === 'Children'">
                <label class="flex-container align-center full-width justify-space-between">
                  <span class="card-text-label margin-right-10">Gender</span>
                  <div v-if="selected_type === 'Children'">
                    <div class="radio-container">
                        <input class="margin-left-10" type="radio" v-model="kamper.gender" value="male" id="formMale">
                        <label for="formMale" class="margin-right-0">M</label>
                    </div>
                    <div class="radio-container">
                        <input class="margin-left-10" type="radio" v-model="kamper.gender" value="female" id="formFemale">
                        <label for="formFemale" class="margin-right-0">F</label>
                    </div>
                  </div>
                </label>
              </div>
            </div>
          </div>
        <div class="margin-top-30 text-center hero-search-button">
          <a href="/search-results" class="button warning xlarge bold find-kamp-button" v-bind:class="{ 'disabled': !isValid(selected_kamp) }" @click.prevent="handleSubmit">Find Your Kamp Now</a>
        </div>
        </div>
      </div>
    </div>

    <!-- <div class="margin-top-30">
      <a href="/search-results" class="button warning xlarge bold find-kamp-button" v-bind:class="{ 'disabled': !isValid(selected_kamp) }" @click.prevent="handleSubmit">Find Your Kamp Now</a>
    </div>-->

  </div>

</div>

<div class="tiny reveal confirm-modal" id="kamp-type-family-modal" data-reveal>
  <p>Please visit the link below to continue with Family registration.</p>
  <a class="button warning bold large float-center" href="https://register.kanakuk.com/registration/EventSelection.aspx" target="_blank">
    Link
  </a>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
